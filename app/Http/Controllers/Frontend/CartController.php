<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Http\Requests\CartRequest;
use Cart;
use Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Model\Product  $product
     * @param  \App\Http\Requests\CartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product,CartRequest $request)
    {  
        $duplicates = Cart::search(
            function ($cartItem, $rowId) use ($product){
                return $cartItem->id === $product->id;
            }
        );

        if ($duplicates->isNotEmpty()) {

            $this->checkWishlist(
                $request,'Item is already in your cart!'
            );

            return redirect()->route('cart.index')->with(
                'success_message', 'Item is already in your cart!'
            );
        }

        Cart::add(
            $product->id, 
            $product->name, 
            $request->quantity, 
            $product->price
        )->associate('App\Models\Product');

        $this->checkWishlist($request);
        
        return redirect()->route('cart.index')->with(
            'success_message', 'Item was added to your cart!'
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CartRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CartRequest $request, $id)
    {
        Cart::update($id, $request->quantity);

        return back()->with('success_message', 'Quantity was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Item has been removed!');
    }

    private function checkWishlist($request,$msg ='Item was added to your cart!' )
    {  // dd($request->has('wishlist'));
        if ($request->has('wishlist')) {
            return back()->with(
                'success_message',$msg
            );
        }
    }
}
