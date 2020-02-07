<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

// 用户收货地址表
/**
 * App\Models\UserAddressModel
 *
 * @property int $id
 * @property int $user_id 用户ID
 * @property int $province 地区表中的省份ID
 * @property int $city 地区表中的城市ID
 * @property int $district 地区表中的区ID
 * @property string $address 详细地址
 * @property int $zip 邮政编码
 * @property int $is_default 是否默认收货地址
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserAddressModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserAddressModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserAddressModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserAddressModel whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserAddressModel whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserAddressModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserAddressModel whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserAddressModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserAddressModel whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserAddressModel whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserAddressModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserAddressModel whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserAddressModel whereZip($value)
 * @mixin \Eloquent
 */
class UserAddressModel extends Model
{
    protected $table = 'user_address';

    public $timestamps = false;

}