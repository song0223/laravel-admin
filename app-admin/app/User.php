<?php

namespace App\Admin;

use App\Model\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static $permissions;

    public function hasPermission($route_name)
    {
        $bool = false;
        $config_permissions = config('permissions');
        $data = [];
        foreach($config_permissions as $permissions){
            foreach($permissions as $permission){
                $data[] = $permission;
            }
        }
        $codes = in_array($route_name, $data);
        if (!$codes) {
            return true;
        }

        if ($this->id == 1){
            return true;
        }
        if (self::$permissions == null) {
            $permissions = collect();

            foreach ($this->roles as $role) {
                foreach ($role->permissions as $permission) {
                    $permissions[] = $permission->toArray();
                }
            }
            self::$permissions = $permissions;
        }

        $bool = self::$permissions->contains(function ($value) use ($route_name) {
            $new_code = str_replace('/', '.', $value['code']);
            return $new_code == $route_name;
        });
        return $bool;
    }

    /**
     * 用户的角色
     * @return mixed
     */
    public function roles()
    {
        return $this->hasMany(Role::class, 'id', 'role_id');
    }
}
