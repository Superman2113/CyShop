<?php


namespace App\Requests\Api\User;


use App\Requests\BaseRequest;


class UpdateInfoRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'nickname' => 'required|unique:user_info,nickname',
        ];
    }

    public function messages()
    {
        return [
            'nickname.required' => '昵称必填',
            'nickname.unique' => '该昵称已存在'
        ];
    }
}