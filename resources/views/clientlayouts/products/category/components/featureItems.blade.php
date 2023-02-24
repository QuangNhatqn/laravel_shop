<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @if(empty($categoryProducts))
        <div class="col-sm-12 text-center"><p>Không có sản phẩm nào</p></div>
    @endif
    @foreach($categoryProducts as $categoryProduct)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{Storage::url($categoryProduct->feature_image_path)}}" alt=""/>
                        <h2>{{ number_format($categoryProduct->price, 0, ',', '.') }} VNĐ</h2>
                        <p>{{$categoryProduct->name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                            cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{ number_format($categoryProduct->price, 0, ',', '.') }} VNĐ</h2>
                            <p>{{$categoryProduct->name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                                cart</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach

</div><!--features_items-->
{{$categoryProducts->links()}}
