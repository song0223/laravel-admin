<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Model\YyUser
 *
 * @mixin \Eloquent
 */
class Category extends Model
{
    use SoftDeletes;

    protected $table = 'category';

    protected $fillable = ['cate_name','img'];

}
