<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //
    const IMAGE_PATH='uploads/';
    protected $table='product_image';
    protected $fillable = [
        'product_id', 'image_name'
    ];

    public function getImagePath($image_name){
        return self::IMAGE_PATH.$image_name;
    }
}
