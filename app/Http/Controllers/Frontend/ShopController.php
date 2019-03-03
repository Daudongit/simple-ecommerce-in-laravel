<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Filters\ProductFilters;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductFilters $productFilter)
    {   
        $products = Product::filter($productFilter)->paginate(12);

        return view('shop')->with([
            'products'=> $products,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {   
        $similarProducts = $product->similar()->take(9)->get();

        return view(
            'product',
            compact('product','similarProducts')
        );
    }
}
