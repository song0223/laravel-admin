<?php

namespace App\Model\Finance;

use App\Model\CarriersUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MoneyDetail extends Model
{
    use SoftDeletes;

    protected $table = 'money_detail';

    protected $fillable = ['user_id', 'phone', 'user_type', 'bd_money', 'pay_type', 'change_type'];

    public function carriersUser()
    {
        return $this->hasOne(CarriersUser::class, 'id', 'user_id');
    }

    /**
     *  会员类型
     */
    const HZ = 1;
    const CYS = 2;
    const CJ = 3;

    public static function typeMap($key = null)
    {
        $items = [
            self::HZ  => '货主',
            self::CYS => '司机',
            self::CJ  => '承运商',
        ];
        return get_items($items, $key);
    }

    /**
     *  支付类型
     */
    const ZFB = 1;
    const WX = 2;
    const YE = 3;
    const XS = 4;

    public static function payMap($key = null)
    {
        $items = [
            self::ZFB => '支付宝',
            self::WX  => '微信',
            self::YE  => '余额',
            self::XS  => '线下汇款',
        ];
        return get_items($items, $key);
    }

    /**
     *  支付类型
     */
    const YHFK = 1;
    const YHCZ = 2;
    const QXFH = 3;
    const ZJDJ = 4;
    const KCJE = 5;
    const WYFJ = 6;
    const YETX = 7;
    const HZFK = 8;
    const BZJ = 9;

    public static function changeMap($key = null)
    {
        $items = [
            self::YHFK => '用户付款',
            self::YHCZ => '用户充值',
            self::QXFH => '取消返回',
            self::ZJDJ => '资金冻结',
            self::KCJE => '扣除金额',
            self::WYFJ => '违约罚金',
            self::YETX => '余额提现',
            self::HZFK => '货主付款',
            self::BZJ  => '保证金',
        ];
        return get_items($items, $key);
    }
}
