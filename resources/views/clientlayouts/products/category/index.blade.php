@extends('clientlayouts.layouts.clients')


@section('title')
    <title> {{$mainCategory->name}} | Shop thời trang</title>
@endsection

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">

                    @include('clientlayouts.index.components.leftSidebar')

                </div>

                <div class="col-sm-9 padding-right">

                    @include('clientlayouts.products.category.components.featureItems')

                </div>
            </div>
        </div>
    </section>
@endsection

