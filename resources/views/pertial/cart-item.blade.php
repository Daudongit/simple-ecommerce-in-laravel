<section class="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        @include('pertial.flash')
        @component('components.carts-table')
        @endcomponent
    </div>
</section> <!--/#cart_items-->