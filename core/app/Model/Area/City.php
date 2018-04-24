<?php

namespace App\Model\Area;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class City extends Model
{

    protected $table = 'city';

    protected $fillable = ['name', 'city_id', 'province_id'];
}
