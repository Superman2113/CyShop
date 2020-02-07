<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserInfoModel
 *
 * @property int $id
 * @property int $user_id 用户ID
 * @property string $nickname 用户昵称
 * @property string $avatar 用户头像
 * @property string $point 用户积分
 * @property int $sex 用户性别:0保密,1男,2女
 * @property string $mobile 用户手机号
 * @property string $truename 用户真实姓名
 * @property string|null $birthday 会员生日
 * @property string $email 邮箱
 * @property int $email_verified 邮箱是否已验证
 * @property string|null $email_verified_at 邮箱验证时间
 * @property string|null $registered_time 注册时间
 * @property-read UsersModel $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserInfoModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserInfoModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserInfoModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserInfoModel whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserInfoModel whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserInfoModel whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserInfoModel whereEmailVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserInfoModel whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserInfoModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserInfoModel whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserInfoModel whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserInfoModel wherePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserInfoModel whereRegisteredTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserInfoModel whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserInfoModel whereTruename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserInfoModel whereUserId($value)
 * @mixin \Eloquent
 */
class UserInfoModel extends Model
{
    protected $table = 'user_info';

    public $timestamps = false;

    protected $fillable = ['user_id', 'nickname', 'avatar', 'point', 'sex', 'mobile', 'truename', 'birthday', 'email',
        'email_verified', 'email_verified_at', 'register_time'];

    // 关联用户表
    public function user()
    {
        return $this->belongsTo(UsersModel::class, 'user_id', 'id');
    }
}