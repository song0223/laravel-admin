<?php

namespace App\Model\Area;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Province extends Model
{

    protected $table = 'province';

    protected $fillable = ['name', 'province_id'];
}
