<?php


namespace App\Requests;

use App\Traits\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Exceptions\RequestInvalidException;


class BaseRequest extends FormRequest
{
    use ApiResponseTrait;

    /**
     * 默认允许访问, 权限控制中间件已经进行过滤了！
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    //
    public function failedValidation(Validator $validator)
    {
        $error = $validator->errors()->first();
        throw new RequestInvalidException($error, 10000);
    }
}