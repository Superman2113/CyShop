<?php


namespace App\Requests\Api\User;


use App\Requests\BaseRequest;

/**
 * 用户注册表单验证
 * @package App\Requests\Api\User
 */
class RegisterRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => 'required|alpha_dash|between:6,20|unique:users,name',
            'password' => 'required|alpha_dash|between:8,20|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户名必填',
            'name.alpha_dash' => '用户名只能为字母、数字、破折号-以及下划线_',
            'name.between'  => '用户名必须在6~20个字符之间',
            'name.unique'  => '该用户名已存在',

            'password.required' => '密码必填',
            'password.alpha_dash' => '密码只能为字母、数字、破折号-以及下划线_',
            'password.between'  => '密码必须在8~20个字符之间',

            'password.confirmed' => '两次密码输入不一致',  // 该验证规则输入中必须存在匹配的 password_confirmation 字段。
        ];
    }
}