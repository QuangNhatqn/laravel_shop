@extends('clientlayouts.layouts.clients')


@section('title')
    <title> Trang chủ: Shop thời trang</title>
@endsection

@section('content')
    @include('clientlayouts.index.components.slider')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">

                    @include('clientlayouts.index.components.leftSidebar')

                </div>

                <div class="col-sm-9 padding-right">

                    @include('clientlayouts.index.components.featuresItems')

                    @include('clientlayouts.index.components.categoryTab')

                    @include('clientlayouts.index.components.recommenedItems')

                </div>
            </div>
        </div>
    </section>
@endsection

