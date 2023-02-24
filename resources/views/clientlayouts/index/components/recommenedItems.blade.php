<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($recommenedProducts as $key => $recommenedProduct)
                @if($key == 0)
                    {!! '<div class="item active">' !!}
                @elseif($key % 3 == 0)
                    {!! '<div class="item">' !!}
                @endif

                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{Storage::url($recommenedProduct->feature_image_path)}}" alt=""/>
                                <h2>{{number_format($recommenedProduct->price, 0, ',', '.')}} VNĐ</h2>
                                <p>{{$recommenedProduct->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                    to cart</a>
                            </div>

                        </div>
                    </div>
                </div>

                @if($key % 3 == 2)
                    {!! '</div>' !!}
                @endif

            @endforeach

        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div><!--/recommended_items-->
