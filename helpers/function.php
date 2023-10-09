<?php
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

if (!function_exists('upload_file')){
    function upload_file($file)
    {
        // Kiểm tra xem tệp đã tải lên thành công hay không
        if ($file->isValid()) {
            // Tạo tên mới cho tệp sử dụng Str::uuid() để đảm bảo duy nhất
            $newFileName = Str::uuid() . '.' . $file->getClientOriginalExtension();

            // Lưu tệp vào thư mục trong storage với tên mới
            $path = $file->storeAs('public/images', $newFileName);

            // Trả về đường dẫn tương đối đến tệp đã lưu
            return $newFileName;
        }

        // Trả về null hoặc thông báo lỗi tùy thuộc vào cách bạn muốn xử lý lỗi
        return null;
    }
}

if (!function_exists('delete_file')){
    function delete_file($pathFile){
        $pathFile = str_replace('storage/', '', $pathFile);
        return Storage::exists($pathFile) ? Storage::delete($pathFile) : null;
    }
}