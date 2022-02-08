<?php

namespace App\Http\Helpers;

use App\Models\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File as FacadesFile;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class FileHelper
{
    public static function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.     
        return preg_replace('/[^A-Za-z0-9\-\_\.]/', '', $string); // Removes special chars.
    }

    public static function upload(UploadedFile $file_request, $dir = "misc", $thumb = false, $thumb_width = 300, $thumb_height = 300)
    {
        $fileModel = new File;
        if ($file_request) {
            $fileName = time() . '_' . $file_request->getClientOriginalName();
            $fileName = self::clean($fileName);
            $filePath = $file_request->storeAs("uploads/" . $dir, $fileName, 'public');
            $fileModel->name = $fileName;
            $fileModel->address = "/storage/" . $filePath;
            $fileModel->type = $file_request->getClientOriginalExtension();
            $fileModel->is_temporary = true;

            // If Thumb Is True
            if ($thumb) {
                // Check Is Image
                if (substr($file_request->getMimeType(), 0, 5) == 'image') {
                    try {
                        $thumb = Image::make($file_request)->resize($thumb_width, $thumb_height, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save(public_path('storage/uploads/thumb/' . $fileName));
                        $fileModel->thumbnail = "/storage/uploads/thumb/" . $fileName;
                    } catch (Exception $e) {
                    }
                }
            }

            $fileModel->save();
            return $fileModel;
        }
    }

    public static function uplodBase64Image($base64)
    {
        list($dataUriScheme, $data) = explode(',', $base64);

        $extension = str_replace(';base64', '', str_replace("data:image/", '', $dataUriScheme));
        $fileModel = new File;

        $fileName = md5(time()) . Str::random(6).'.' . $extension;

        // Upload path
        $uploadPath = public_path("//uploads//") . $fileName;
        $thumbnailUploadPath = public_path("//uploads//thumbnail//") . $fileName;


        $image = base64_decode($data);

        $imageModel = Image::make($image);

        // Save Resized File
        $imageModel->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($uploadPath);

        // Save Thumbnail
        $imageModel->resize(25, 25, function ($constraint) {
            $constraint->aspectRatio();
        })->blur(5)->save($thumbnailUploadPath);

        $fileModel->name = $fileName;
        $fileModel->file_address = self::generateImageAddress($fileName);
        $fileModel->thumbnail_address = self::generateThumbnailAddress($fileName);
        $fileModel->type = $extension;
        $fileModel->is_temporary = true;
        $fileModel->save();
        return $fileModel;
    }

    public static function generateThumbnailAddress($fileName){
        return '/uploads/thumbnail/'.$fileName;
    }

    public static function generateImageAddress($fileName){
        return '/uploads/'.$fileName;
    }

    public static function removeFile(File $fileModel){
        $thumbnailFileLocation = public_path($fileModel->thumbnail_address); 
        $fileLocation = public_path($fileModel->file_address);
        FacadesFile::delete($thumbnailFileLocation, $fileLocation); 
    }
}
