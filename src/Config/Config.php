<?php

namespace Encore\Admin\Config;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * Database-backed configuration loader with a whitelist guard.
 *
 * The admin_config table is a classic backdoor target: anyone who can write
 * arbitrary rows into it (stolen admin account, SQLi, webshell) could
 * otherwise hijack runtime behaviour through keys like `view.compiled` or
 * `session.driver`. load() therefore only injects names within the allowed
 * prefixes (default `base.*`, configurable via `admin.database_config.allowed_prefixes`
 * or the legacy `admin.extensions.config.allowed_prefixes`), silently skips
 * extension metadata rows (`__`-prefixed), and logs anything else it refuses.
 */
class Config
{
    /**
     * Load whitelisted config rows into the Laravel config repository.
     *
     * @return void
     */
    public static function load()
    {
        $allowed = static::allowedPrefixes();

        foreach (ConfigModel::query()->get(['name', 'value']) as $config) {
            $name = (string) $config->name;

            // extension metadata rows (e.g. configx's __configx__) are known
            // safe: never injected, and silently skipped instead of spamming
            // the log with a warning on every request
            if (strpos($name, '__') === 0) {
                continue;
            }

            if (! static::isAllowedName($name, $allowed)) {
                Log::warning('[Config] blocked dangerous config injection', [
                    'name' => $name,
                ]);
                continue;
            }

            config([$name => $config->value]);
        }
    }

    /**
     * Try to load, silently degrade when the table is missing or the DB is
     * unreachable (fresh installs / migrations / console commands).
     *
     * Skips entirely on non-admin requests and in the console - the loaded
     * values only feed admin-facing features, so the rest of the app should
     * not pay a full table scan per request. Result is memoized per request.
     *
     * @return void
     */
    public static function tryLoad()
    {
        if (config('admin.database_config.enable', true) === false) {
            return;
        }

        if (app()->runningInConsole()) {
            return;
        }

        // limit to admin routes by default - front-facing pages should not
        // pay a table scan for admin-only settings (toggle via
        // admin.database_config.admin_only). request()->path() has NO
        // leading slash, so compare without one.
        if (config('admin.database_config.admin_only', true)) {
            $prefix = trim((string) config('admin.route.prefix', 'admin'), '/');
            $path = trim(request()->path(), '/');

            if ($path !== $prefix && !Str::is($prefix.'/*', $path)) {
                return;
            }
        }

        // memoize per request via request attributes - a plain static flag
        // would leak across requests on long-lived workers (octane)
        $request = request();

        if ($request && $request->attributes->has(self::class)) {
            return;
        }

        if ($request) {
            $request->attributes->set(self::class, true);
        }

        try {
            static::load();
        } catch (\Throwable $e) {
            //
        }
    }

    /**
     * @param string $name
     * @param array  $allowedPrefixes
     *
     * @return bool
     */
    public static function isAllowedName($name, array $allowedPrefixes)
    {
        foreach ($allowedPrefixes as $prefix) {
            if ((string) $prefix !== '' && stripos($name, $prefix) === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array
     */
    public static function allowedPrefixes()
    {
        $prefixes = config('admin.database_config.allowed_prefixes');

        if ($prefixes === null) {
            // legacy key of the laravel-admin-ext/config package (v1.1.1+)
            $prefixes = config('admin.extensions.config.allowed_prefixes');
        }

        return (array) ($prefixes !== null ? $prefixes : ['base.']);
    }
}
