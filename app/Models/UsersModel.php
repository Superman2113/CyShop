<?php


namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * App\Models\UsersModel
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsersModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsersModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsersModel query()
 * @mixin \Eloquent
 */
class UsersModel extends Authenticatable implements JWTSubject
{
    use Notifiable;

    public $timestamps = true;

    CONST USER_STATUS_ON = 1;  // 账号启用
    CONST USER_STATUS_OFF = 0; // 账号禁用

    CONST USER_STATUS_MAP = [
        self::USER_STATUS_ON => '启用',
        self::USER_STATUS_OFF => '禁用'
    ];

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
    public function userInfo()
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