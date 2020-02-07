<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * 用户模型定义
 *
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsersModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsersModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsersModel query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name 登录名
 * @property string $password 登录密码md5加密
 * @property int $status 账号状态: 1 启用 0 禁用
 * @property string|null $remember_token 登录凭证
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|UserAddressModel[] $userAddress
 * @property-read int|null $user_address_count
 * @property-read UserInfoModel $userInfo
 * @property-read Collection|UserLoginLogModel[] $userLoginLog
 * @property-read int|null $user_login_log_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsersModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsersModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsersModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsersModel wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsersModel whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsersModel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsersModel whereUpdatedAt($value)
 * @property-read UserInfoModel $profile
 */
class UsersModel extends Authenticatable implements JWTSubject
{
    use Notifiable;

    public $timestamps = true;

//    CONST USER_STATUS_ON = 1;  // 账号启用
//    CONST USER_STATUS_OFF = 0; // 账号禁用
//
//    CONST USER_STATUS_MAP = [
//        self::USER_STATUS_ON => '启用',
//        self::USER_STATUS_OFF => '禁用'
//    ];

    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'password',
    ];


    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $with = [
        'profile'
    ];

    /**
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    // 关联用户详情表
    public function profile()
    {
        return $this->hasOne(UserInfoModel::class, 'user_id', 'id');
    }

    // 关联用户收货地址表
    public function userAddress()
    {
        return $this->hasMany(UserAddressModel::class, 'user_id', 'id');
    }

    // 关联用户登录记录表
    public function userLoginLog()
    {
        return $this->hasMany(UserLoginLogModel::class, 'user_id', 'id');
    }
}