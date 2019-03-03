<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Product;
use View;

class ViewComposerServiceProvider extends ServiceProvider
{   

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {   
        View::composer('pertial.slider',function ($view){
           $view->with('sliders',Slider::whereStatus(1)->get());
        });

        View::composer('pertial.brand',function ($view){
           $view->with('brands',Brand::withCount('products')->get());
        });

        View::composer('pertial.header',function ($view){
           $view->with('brands',Brand::all());
        });

        View::composer(['pertial.category','pertial.header'],function ($view){
           $view->with('categories',Category::all());
        });

        View::composer('pertial.recommended-item',function ($view){
           $view->with('recommendedProducts',Product::recommended()->take(9)->get());
        });


        //View::composer('backend.index', 'App\Http\Composers\SideNavComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
