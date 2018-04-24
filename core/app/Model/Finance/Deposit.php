<?php

namespace App\Model\Finance;

use App\Model\CarriersUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Deposit extends Model
{
    use SoftDeletes;

    protected $table = 'deposit';

    protected $fillable = ['user_id','money'];

    public function carriersUser()
    {
        return $this->hasOne(CarriersUser::class, 'id', 'user_id');
    }
}
