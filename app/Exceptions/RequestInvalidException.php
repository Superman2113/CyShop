<?php


namespace App\Exceptions;

use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Http\Request;


/**
 * 请求参数验证异常处理
 * Class RequestInvalidException
 * @package App\Exceptions
 */
class RequestInvalidException extends Exception
{
    use ApiResponseTrait;

    protected $msg, $errno;

    public function __construct($msg="", $errno=10000)
    {
        $this->msg = $msg;
        $this->errno = $errno;
    }

    public function render(Request $request)
    {
        return $this->error($this->errno, $this->msg);
    }
}