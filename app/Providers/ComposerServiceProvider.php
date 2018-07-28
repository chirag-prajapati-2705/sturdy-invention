<?php
/**
 * Created by PhpStorm.
 * User: Chirag-Chiku
 * Date: 1/23/2017
 * Time: 11:32 PM
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['view']->composer(['errors.404','home.index','footer'], function ($view) {
            $categories=$this->app->make('App\Interfaces\CategoryRepositoryInterface')->getAllCategory();
            $banners=$this->app->make('App\Interfaces\BannerRepositoryInterface')->getAllBanner();
            $products=$this->app->make('App\Interfaces\ProductRepositoryInterface')->getAllProducts();

            dd($products);
            $view->with('categories',$categories)
                 ->with('banners',$banners)
                 ->with('products',$products);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
