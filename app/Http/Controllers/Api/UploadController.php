<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Services\Api\UploadService;

class UploadController extends Controller
{


    public function __construct(UploadService $service)
    {
        $this->service = $service;
    }

    /**
     * 富文本编辑图片上传
     * @return array
     */
    public function editor()
    {
        return $this->service->editor();
    }
}