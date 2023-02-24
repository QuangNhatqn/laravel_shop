<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">

            @foreach($tags as $key => $tag)
                <li class="{{$key == 0 ? 'active' : ''}}"><a href="#tags_{{$tag->id}}"
                                                             data-toggle="tab">{{$tag->name}}</a></li>
            @endforeach

        </ul>
    </div>
    <div class="tab-content">

        @foreach($tags as $key => $tag)
            <div class="tab-pane fade {{$key == 0 ? 'active in' : ''}}" id="tags_{{$tag->id}}">
                @foreach(\App\Models\Tag::find($tag->id)->products()->take(4)->get() as $productTag)

                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{Storage::url($productTag->feature_image_path)}}" alt=""/>
                                <h2>{{number_format($productTag->price, 0, ',', '.')}} VNĐ</h2>
                                <p>{{$productTag->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                    to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        @endforeach

    </div>
</div><!--/category-tab-->
