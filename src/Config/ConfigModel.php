<?php

namespace Encore\Admin\Config;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ConfigModel extends Model
{
    /**
     * Settings table name, override via config('admin.database_config.table').
     *
     * @var string
     */
    protected $table = 'admin_config';

    /**
     * @var array
     */
    protected $fillable = ['name', 'value', 'description'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('admin.database_config.table', 'admin_config'));
    }

    /**
     * [Security] Save-side whitelist guard, mirroring the load-side guard in
     * Config::load(). Every write path (create, update, import scripts) funnels
     * through save(), so a name check here closes the whole surface even when
     * an admin account is stolen: rows like `view.compiled` are refused and
     * logged. Extension metadata rows (`__`-prefixed, e.g. configx's
     * __configx__) are exempt - they never reach config injection.
     *
     * @param array $options
     * @return bool
     * @throws \Exception
     */
    public function save(array $options = [])
    {
        $name = (string) $this->name;

        if (strpos($name, '__') !== 0 && ! Config::isAllowedName($name, Config::allowedPrefixes())) {
            Log::warning('[Config] blocked dangerous config write', [
                'name' => $name,
            ]);

            throw new \Exception("Config: config name [{$name}] is not in the allowed prefixes, saving refused.");
        }

        return parent::save($options);
    }

    protected static function booted()
    {
        static::deleting(function (self $config) {
            if (strpos((string) $config->name, '__') === 0) {
                throw new \Exception('Config: extension metadata rows (starting with __) cannot be deleted.');
            }
        });
    }
}
