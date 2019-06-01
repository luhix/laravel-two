<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/31
 * Time: 18:34
 */

namespace App\Handlers;


class ImageUploadHandler
{
    protected $allowed_ext = ['png','jpg','gif','jpeg'];
    
    public function save($file, $folder, $file_prefix)
    {
        // 构建存储的文件夹规则，值如：uploads/images/avatars/201905/31/
        // 文件夹切割能让查找效率更高
        $folder_name = "uploads/images/$folder/" . date('Ym/d', time());
        
        $upload_path = public_path() . '/' . $folder_name;
        
        $extension = strtolower($file->getClientOriginalExtension()) ? : 'png';
        
        $filename = $file_prefix . '_' . time() . '_' . str_random(10) . '.' . $extension;
        
        if ( ! in_array($extension, $this->allowed_ext)) {
            return false;
        }
        
        $file->move($upload_path, $filename);
        
        return [
          'path' => config('app.url') . "/$folder_name/$filename" 
        ];
    }
}