<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RolePermission extends Model
{
    use SoftDeletes;

    protected $table = 'role_permission';

    protected $fillable = ['role_id', 'permission_id'];
}
