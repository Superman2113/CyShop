<?php


namespace App\Traits;


/** 接口返回格式定义
 * Class ApiResponseTrait
 * @package App\Traits
 */
trait ApiResponseTrait
{
    /**
     * 返回成功数据
     * @param $data
     * @param string $msg
     * @return false|string
     */
    public function data($data, $msg='')
    {
        $resp = [
            'status' => 1,
            'data'=>$data,
            'msg' => $msg,
            'errno' => 0
        ];

        return response()->json($resp);
    }

    /**
     * 返回错误信息
     * @param $errno
     * @param string $msg
     * @return false|string
     */
    public function error($errno, $msg='')
    {
        $resp = [
            'status' => 0,
            'errno' => $errno,
            'data' => [],
            'msg'  => $msg,
        ];
        return response()->json($resp);
    }
}