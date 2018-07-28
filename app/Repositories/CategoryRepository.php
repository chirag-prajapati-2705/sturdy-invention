<?php
/**
 * Created by PhpStorm.
 * User: Chirag-Chiku
 * Date: 9/12/2016
 * Time: 11:49 PM
 */
namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Model\Category;

Class CategoryRepository implements CategoryRepositoryInterface
{
    public function getById($slug)
    {
        $product = Category::where('url', $slug)->first();
        return $product;
    }

    public function getByCategory($category){

         return $category->products()->with('image')->get()  ;
    }
    public function getAllCategory(){
        return Category::all();
    }
}
