<?php
/**
 * Created by PhpStorm.
 * User: Akash
 * Date: 6/29/2016
 * Time: 10:32 PM
 */
namespace App\Interfaces;

interface ProductRepositoryInterface{
    public function getById($slug);
    public function getAllProducts();
}