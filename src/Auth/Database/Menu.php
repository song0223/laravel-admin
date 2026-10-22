<?php

namespace Encore\Admin\Auth\Database;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

/**
 * Class Menu.
 *
 * @property int $id
 *
 * @method where($parent_id, $id)
 */
class Menu extends Model
{
    use DefaultDatetimeFormat;
    use ModelTree {
        ModelTree::boot as treeBoot;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_id', 'order', 'title', 'icon', 'uri', 'permission'];

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $connection = config('admin.database.connection') ?: config('database.default');

        $this->setConnection($connection);

        $this->setTable(config('admin.database.menu_table'));

        parent::__construct($attributes);
    }

    /**
     * A Menu belongs to many roles.
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        $pivotTable = config('admin.database.role_menu_table');

        $relatedModel = config('admin.database.roles_model');

        return $this->belongsToMany($relatedModel, $pivotTable, 'menu_id', 'role_id');
    }

    /**
     * @return array
     */
    public function allNodes(): array
    {
        $connection = config('admin.database.connection') ?: config('database.default');
        $orderColumn = DB::connection($connection)->getQueryGrammar()->wrap($this->orderColumn);

        $byOrder = 'ROOT ASC,'.$orderColumn;

        $query = static::query();

        if (config('admin.check_menu_roles') !== false) {
            $query->with('roles');
        }

        $nodes = $query->selectRaw('*, '.$orderColumn.' ROOT')->orderByRaw($byOrder)->get()->toArray();

        // [Feature] 多语言菜单标题: 配置 admin.database_config.menu_translation_table 后,
        // 按 app locale 从翻译表取标题替换(列约定: locale / 主键外键列 / title),
        // 翻译缺失或表不可用时静默保留主表 title。配合后台语言切换中间件使用。
        if ($table = config('admin.database_config.menu_translation_table')) {
            $locale = app()->getLocale();
            $menuKey = config('admin.database_config.menu_translation_menu_key', 'menu_id');
            try {
                $map = DB::connection($connection)->table($table)
                    ->where('locale', $locale)
                    ->pluck('title', $menuKey)
                    ->all();
                foreach ($nodes as &$node) {
                    $translated = $map[$node['id']] ?? null;
                    if (is_string($translated) && $translated !== '') {
                        $node['title'] = $translated;
                    }
                }
                unset($node);
            } catch (\Throwable $e) {
                \Illuminate\Support\Facades\Log::warning('menu translation skipped: '.$e->getMessage());
            }
        }

        return $nodes;
    }

    /**
     * determine if enable menu bind permission.
     *
     * @return bool
     */
    public function withPermission()
    {
        return (bool) config('admin.menu_bind_permission');
    }

    /**
     * Detach models from the relationship.
     *
     * @return void
     */
    protected static function boot()
    {
        static::treeBoot();

        static::deleting(function ($model) {
            $model->roles()->detach();
        });
    }
}
