<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Mail\OrderPlaced;
use App\Http\Requests\CheckoutRequest;
use Cart;
use Mail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
        }

        if (auth()->user() && request()->is('guestCheckout')) {
            return redirect()->route('checkout.index');
        }

        return view('checkout');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {
        // Check race condition when there are less items available to purchase
        if ($this->productsAreNoLongerAvailable()) {
            return back()->withErrors(
                'Sorry! One of the items in your cart is no longer avialble.'
            );
        }

        $order = $this->addToOrdersTables($request, null);

        Mail::send(new OrderPlaced($order));

        // decrease the quantities of all the products in the cart
        $this->decreaseQuantities();

        Cart::instance('default')->destroy();

        return redirect()->route('confirmation.index')->with(
            'success_message', 'Thank you! Your payment has been successfully accepted!'
        );
        
    }


    protected function addToOrdersTables($request, $error)
    {
        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->id() : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address1' => $request->address,
            'billing_address2' => $request->address,
            'billing_city' => $request->city,
            'billing_area' => $request->area,
            'billing_phone' => $request->phone,
            'billing_subtotal' => Cart::subtotal(),
            'billing_tax' => config('cart.tax'),
            'billing_total' => Cart::total(),
            'error' => $error,
        ]);

        // Insert into order_product table
        Cart::content()->each(function($item)use($order){
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        });

        return $order;
    }

    protected function decreaseQuantities()
    {   
        Cart::content()->each(function($item){
            $product = Product::find($item->model->id);

            $product->update(['quantity' => $product->quantity - $item->qty]);
        });
    }

    protected function productsAreNoLongerAvailable()
    {   
        Cart::content()->each(function($item){
            $product = Product::find($item->model->id);
            if ($product->quantity < $item->qty) {
                return true;
            }
        });

        return false;
    }
}
