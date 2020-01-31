<?php


namespace App\Requests\Api\User;


use App\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '账号必填',
            'password.required' => '密码必填',
        ];
    }
}