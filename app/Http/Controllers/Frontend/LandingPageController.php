<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('featured', true)
            ->take(6)->inRandomOrder()->get();

        $categoriseProducts = Category::with([
            'products'=>function($query){
                 $query->oldest();
            }
        ])->take(5)->get();
            
        return view('landing-page')->with([
            'products'=> $products,
            'categoriseProducts'=>$categoriseProducts
        ]);
    }
}
