<?php


namespace App\Services\Api;





use Illuminate\Support\Facades\Storage;


/***
 * 文件上传
 * Class UploadService
 * @package App\Services\Api
 */
class UploadService
{

    /**
     * wang-editor编辑器的文件上传
     * @return array
     */
    public function editor()
    {
        $urls = [];

        foreach (request()->file() as $file) {
            $urls[] = Storage::url($file->store('editors'));
        }

        return [
            "errno" => 0,
            "data"  => $urls,
        ];
    }
}