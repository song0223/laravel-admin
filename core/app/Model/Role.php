<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Role extends Model
{
    use SoftDeletes;

    protected $table = 'role';

    protected $fillable = ['permission_id', 'name', 'desc'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission', 'role_id', 'permission_id')->withTimestamps()->whereNull('role_permission.deleted_at');
    }
}
