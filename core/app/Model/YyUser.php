<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class YyUser extends Model
{
    use SoftDeletes;

    protected $table = 'yy_user';

    protected $fillable = ['username', 'user_tel', 'province', 'city', 'area', 'address', 'scope', 'tax_num', 'reg_address', 'bank', 'license', 'email', 'user_type', 'is_cert', 'user_source', 'is_type', 'reg_time', 'deposit', 'reg_tel', 'credibility', 'user_score', 'sex', 'user_code', 'company_name', 'y_amount', 'is_audit', 'not_through'];


    /**
     *  会员类型
     */
    const HZ = 1;//货主

    public static function typeMap($key = null)
    {
        $items = [
            self::HZ => '货主',
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
