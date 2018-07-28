<?php
/**
 * Created by PhpStorm.
 * User: Chirag-Chiku
 * Date: 1/20/2017
 * Time: 10:07 PM
 */

namespace App\Model;

use App\Model\ProductImage;
use Illuminate\Database\Eloquent\Model;

class Banner extends  \Eloquent
{
    //
    protected $table='banner';
    protected $primaryKey = 'banner_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'banner_id', 'image'
    ];
    public $timestamps = false;
}