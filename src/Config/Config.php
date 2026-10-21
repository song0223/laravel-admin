<?php

namespace Encore\Admin\Config;

use Illuminate\Support\Facades\Log;

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
     * @return void
     */
    public static function tryLoad()
    {
        if (config('admin.database_config.enable', true) === false) {
            return;
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
