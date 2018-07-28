<?php
/**
 * Created by PhpStorm.
 * User: Chirag-Chiku
 * Date: 1/20/2017
 * Time: 9:50 PM
 */

namespace App\Http\Controllers\Admin;

use App\Model\Banner;
use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\Category;
use App\Model\ProductImage;
use App\Http\Requests;
use Illuminate\Http\Request;
use Redirect;
use App\Http\Controllers\Controller;
use Validator;
use Input;
use DB;
use Session;
use App\Service\UploadService;

class BannerController extends Controller
{
    protected $upload_service;
    const RESIZE_IMAGE_WIDTH = '200';
    public function __construct(UploadService $upload_service){
        $this->upload_service=$upload_service;
    }
    public function index()
    {
        $banners=Banner::all();
        return \View::make('admin.banner.view')->with('banners', $banners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return \View::make('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('admin/banner/create')->withInput()->withErrors($validator);
        } else {
            if (Input::hasFile('image')) {
                $file = Input::file('image');
                $image_name = $this->upload_service->upload($file, self::RESIZE_IMAGE_WIDTH, true);
                $banner = New Banner();
                $banner->image=$image_name;
                $banner->save();
            }
            Session::flash('success', 'Banner successfully created!');
            return Redirect('admin/banner');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.edit')->with('banner',$banner);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, \Request $request)
    {
           $banner = Banner::find($id);
            if (Input::hasFile('image')) {
                $file = Input::file('image');
                $image_name = $this->upload_service->upload($file, self::RESIZE_IMAGE_WIDTH, true);
                $banner->banner_id = $id;
                $banner->image = $image_name;
                $banner->save();
            }
            Session::flash('success', 'Banner successfully updated!');
            return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $delete_product = Banner::destroy($id);
        if ($delete_product) {
            Session::flash('success', 'Banner successfully deleted!');
            return Redirect('admin/banner');
        }
    }


}
