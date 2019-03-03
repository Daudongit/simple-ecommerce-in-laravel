<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>₦{{Cart::total()}}</span></li>
                        <li>Tax <span>{{config('cart.tax')}}%</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>₦{{Cart::subtotal()}}</span></li>
                    </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="/checkout">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->