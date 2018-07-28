<?php


namespace App\Http\Controllers\Admin;

use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\Category;
use App\Model\ProductImage;
use Illuminate\Http\Request;
use App\Http\Requests;
use Redirect;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use DB;
use Session;
use App\Service\UploadService;

class ProductController extends Controller
{

    const RESIZE_IMAGE_WIDTH = '200';

    protected $image_service;

    public function __construct(UploadService $image_service)
    {
        $this->image_service = $image_service;
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'sku' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('admin/product/create')->withInput()->withErrors($validator);
        } else {
            $product = New Product();
            $product->fill($request->all());
            $product->save();
            if (Input::hasFile('image')) {
                $file = Input::file('image');
                $image_name = $this->image_service->upload($file, self::RESIZE_IMAGE_WIDTH, true);
                $product_image = New ProductImage();
                $product_image->product_id = $product->product_id;
                $product_image->image_name = $image_name;
                $product_image->save();
            }
            if ($request->get('category_name')) {
                $this->saveCategory($request->get('category_name'), $product->product_id);
            }
           Session::flash('success', 'Product successfully created!');
            return Redirect('admin/product/show');
        }
    }

    public function edit($product_id, Request $request)
    {
        $product = Product::find($product_id);
        //dd($product->image);
        $categories = Category::all();
        $product_category = $this->getCategoryList($product->productCategory);
        return view('admin.product.edit', compact('product'))->with('categories', $categories)->with('product_category', $product_category);
    }

    public function getCategoryList($product_category)
    {
        $category_array = [];
        foreach ($product_category as $key => $category) {
            $category_array[$key] = $category->category_id;
        }
        return $category_array;
    }

    public function show()
    {
        $products = Product::all();
        return view('admin.product.view')->with('products', $products);
    }

    public function update($product_id, Request $request)
    {
        $rules = array(
            'name' => 'required',
            'sku' => 'required',
            'status' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('admin/product/create')->withInput()->withErrors($validator);
        } else {

            $product = Product::find($product_id);
            $product->fill($request->all());
            $product->save();
            if (Input::hasFile('image')) {
                $file = Input::file('image');
                $image_name = $this->image_service->upload($file, self::RESIZE_IMAGE_WIDTH, true);
                $this->saveImage(Input::get('image_id'), $product_id, $image_name);
            }
            if ($request->get('category_name')) {
                $this->saveCategory($request->get('category_name'), $product->product_id);
            }
            Session::flash('success', 'Product successfully updated!');
            return Redirect::back();
        }
    }

    public function saveCategory($category_id, $product_id)
    {
        $category_ids = explode(',', trim($category_id, ','));
        $category_ids = array_unique($category_ids);
        DB::table('product_category')->where('product_id', '=', $product_id)->delete();
        foreach ($category_ids as $category_id) {
            $product_category = New ProductCategory();
            $product_category->product_id = $product_id;
            $product_category->category_id = $category_id;
            $product_category->save();
        }
    }

    public function saveImage($image_id, $product_id, $image_name)
    {
        $product_image = ProductImage::find($image_id);
        $product_image->product_id = $product_id;
        $product_image->image_name = $image_name;
        $product_image->save();
    }

    public function destroy($product_id)
    {
        $delete_product = Product::destroy($product_id);

        if ($delete_product) {
            Session::flash('success', 'Product successfully deleted!');
            return Redirect('admin/product/show');
        }
    }
}
