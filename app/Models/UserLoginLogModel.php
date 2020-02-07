<?php


namespace App\Models;


use Eloquent;
use Illuminate\Database\Eloquent\Model;


/**
 * 用户登录日志表
 * Class UserLoginLogModel
 *
 * @package App\Models
 * @property int $id
 * @property int $user_id 用户ID
 * @property string $login_ip 登录IP
 * @property string $login_time 登录时间
 * @property int $login_status 登录状态1登录成功, 0登录失败
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLoginLogModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLoginLogModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLoginLogModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLoginLogModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLoginLogModel whereLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLoginLogModel whereLoginStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLoginLogModel whereLoginTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserLoginLogModel whereUserId($value)
 * @mixin Eloquent
 */
class UserLoginLogModel extends Model
{
    protected $table = 'user_login_log';

    protected $fillable = ['user_id', 'login_ip', 'login_time', 'login_status'];

    /**
     * ip int 转回 str
     * @param $value
     * @return string
     */
    public function getLoginIpAttribute($value)
    {
        return long2ip($value);
    }
}