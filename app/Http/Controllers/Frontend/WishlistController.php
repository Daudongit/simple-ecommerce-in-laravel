<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Wishlist;
use App\Models\User;

class WishlistController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = auth()->user()->wishlist()->paginate(20);

        return view('wishlist',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product,Request $request)
    {   
        if($this->wishlist($product->id)->exists())
        {
            return back()->with(
                'success_message',
                'Item is already in your wishlist'
            );
        }

        Wishlist::create([
            'user_id'=>auth()->id(),
            'product_id'=>$product->id
        ]);

        return back()->with(
            'success_message',
            'Item added to your wishlist successfully'
        );
    }                                                                                                                                                                                                                                                                                                                                                                                                        


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $wishlist = $this->wishlist($product->id);

        $wishlist->delete();

        return back()->with(
            'success_message',
            'Item successfully removed from wishlist'
        );
    }

    // public function delete(Request $request)
    // {
    //     auth()->user()->wishlist()->detach($id);

    //     return back()->with(
    //         'success_message',
    //         'Item successfully removed from wishlist'
    //     );
    // }

    private function wishlist($productId)
    {
       return Wishlist::where([
            'product_id'=>$productId,
            'user_id'=>auth()->id()
        ]); 
    }
}
