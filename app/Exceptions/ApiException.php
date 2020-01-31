<?php


namespace App\Exceptions;


use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Http\Request;


/**
 * api通用异常处理
 * Class RequestInvalidException
 * @package App\Exceptions
 */
class ApiException extends Exception
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