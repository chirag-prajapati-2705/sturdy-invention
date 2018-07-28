<?php
/**
 * Created by PhpStorm.
 * User: Akash
 * Date: 6/18/2016
 * Time: 10:54 AM
 */
namespace App\Service;
use Intervention\Image\Facades\Image;
Class UploadService {

    const IMAGE_UPLOAD_PATH='uploads';
    const THUMB_PATH='thumb';
    public function __construct(){

    }

    public function upload($file,$resize_width,$thumb=false){
        $imageRealPath 	= 	$file->getRealPath();
        $thumbName 		= 	time().'_'.$file->getClientOriginalName();
        $image_name = Image::make($imageRealPath)->save(public_path(self::IMAGE_UPLOAD_PATH).'/'.$thumbName);
        if($thumb){
            $image_name=  	$this->resize($image_name,$resize_width,$thumbName);
        }
        return $image_name;
    }

    public function resize($image, $size,$image_name)
    {
        try
        {
            $image->resize(intval($size), null, function($constraint) {
                $constraint->aspectRatio();
            });
            $image->save(public_path(self::IMAGE_UPLOAD_PATH.'/'.self::THUMB_PATH).'/'.$image_name);
            return $image_name;
        }
        catch(Exception $e)
        {
            return false;
        }
    }
}