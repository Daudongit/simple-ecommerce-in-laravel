<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    @foreach ($categories as $category)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="/shop?category={{$category->slug}}">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        {{$category->name}}
                    </a>
                </h4>
            </div>
        </div>
    @endforeach
</div><!--/category-products-->