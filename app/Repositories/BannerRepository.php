<?php
/**
 * Created by PhpStorm.
 * User: Chirag-Chiku
 * Date: 1/27/2017
 * Time: 9:53 PM
 */

namespace App\Repositories;
use App\Interfaces\BannerRepositoryInterface;
use App\Model\Banner;

Class BannerRepository implements BannerRepositoryInterface
{
    public function getAllBanner()
    {
        return Banner::all();
    }
}