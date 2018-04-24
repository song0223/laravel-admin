<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserRole extends Model
{
    use SoftDeletes;

    protected $table = 'user_role';

    protected $fillable = ['user_id', 'role_id'];
}
