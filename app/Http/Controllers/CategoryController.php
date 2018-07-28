<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Interfaces\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;


class CategoryController extends Controller
{
    //
    protected $category_repository;
    public function __construct(CategoryRepository $category_repository){
        $this->category_repository=$category_repository;
    }
    public function index($slug){
        $category=$this->category_repository->getById($slug);
        $products=$this->category_repository->getByCategory($category);

        return view('category.index')->with('category',$category)->with('products',$products);
    }
}
