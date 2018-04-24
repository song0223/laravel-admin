<?php

namespace App\Model\Area;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Area extends Model
{

    protected $table = 'area';

    protected $fillable = ['name', 'area_id', 'city_id'];
}
