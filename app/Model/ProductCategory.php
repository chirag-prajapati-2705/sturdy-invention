<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class ProductCategory extends  \Eloquent
{
    //
    protected $table='product_category';
    protected $primaryKey = 'product_category_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;

    protected $fillable = [
        'product_id', 'category_id'
    ];


}
