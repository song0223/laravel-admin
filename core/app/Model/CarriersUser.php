<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CarriersUser extends Model
{
    use SoftDeletes;

    protected $table = 'carriers_user';

    protected $fillable = ['username', 'user_tel', 'province', 'city', 'area', 'address', 'scope', 'tax_num', 'reg_address', 'bank', 'license', 'email', 'user_type', 'is_cert', 'user_source', 'is_type', 'reg_time', 'deposit', 'reg_tel', 'credibility', 'user_score', 'sex', 'is_pay', 'company_name', 'y_amount', 'company_name', 'shorthand', 'is_audit', 'not_through'];

    public function getOneById($id)
    {
        return $this->find($id);
    }

    /**
     *  会员类型
     */
    const SJ = 1;//司机
    const CYS = 2;//承运商

    public static function typeMap($key = null)
    {
        $items = [
            self::SJ  => '司机',
            self::CYS => '承运商',
        ];
        return get_items($items, $key);
    }

    /**
     * 是否认证
     */
    const YES = 1;
    const NO = 2;

    public static function certMap($key = null)
    {
        $items = [
            self::YES => '是',
            self::NO  => '否',
        ];
        return get_items($items, $key);
    }

    /**
     * 使用状态
     */
    const ENABLE = 1;//启用
    const DISABLE = 2;//禁用

    public static function statusMap($key = null)
    {
        $items = [
            self::ENABLE  => '启用',
            self::DISABLE => '禁用',
        ];
        return get_items($items, $key);
    }

    /**
     * 押金状态
     */
    const PAY_YES = 1;
    const PAY_NO = 2;

    public static function payMap($key = null)
    {
        $items = [
            self::ENABLE  => '是',
            self::DISABLE => '否',
        ];
        return get_items($items, $key);
    }

    /**
     * 会员来源
     */
    const QQ = 1;
    const WX = 2;
    const APP = 3;

    public static function sourceMap($key = null)
    {
        $items = [
            self::QQ  => 'QQ',
            self::WX  => '微信',
            self::APP => 'APP',
        ];
        return get_items($items, $key);
    }

    /**
     * 会员来源
     */
    const CHECK_YES = 1;
    const CHECK_NO = 2;
    const CHECK_IN = 3;

    public static function checkMap($key = null)
    {
        $items = [
            self::CHECK_YES => '已通过',
            self::CHECK_NO  => '未通过',
            self::CHECK_IN  => '审核中',
        ];
        return get_items($items, $key);
    }
}
