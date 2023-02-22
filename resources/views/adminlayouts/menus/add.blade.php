@extends('adminlayouts.layouts.admin')

@section('title')
    <title>Add Menu</title>
@endsection

@section('css_add')
    <link rel="stylesheet" type="text/css" href="{{asset('adminbite/assets/libs/select2/dist/css/select2.min.css')}}"/>
@endsection

@section('css_custom_add')
    <link rel="stylesheet" type="text/css" href="{{asset('adminbite/assets/custom/css/admintalert.css')}}"/>
@endsection

@section('content')
    <div class="page-wrapper">

        <div class="container-fluid">
            @include('adminlayouts.partials.content-header', ['name' => 'Menu', 'key' => 'Add', 'link' => route('menus.index')])

            <form class="form-horizontal r-separator" action="{{route('menus.store')}}" method="post">
                @csrf
                <div class="card-body bg-light">
                    <div class="form-group row align-items-center m-b-0">
                        <label for="name" class="col-3 text-right control-label col-form-label">Menu</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" value="{{old('name')}}" placeholder="Menu Name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center m-b-0 @error('parent_id') is-invalid @enderror">
                        <label for="parent_id" class="col-3 text-right control-label col-form-label">Parent Menu</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <select class="select2 form-control custom-select" name="parent_id" id="parent_id" style="width: 100%; height:36px;">
                                <option value="0">Select Parent Menu</option>
                                {!!$htmlOption!!}
                            </select>
                            @error('parent_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group m-b-0 text-right">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                        <a href="{{route('menus.index')}}" class="btn btn-dark waves-effect waves-light">Cancel</a>
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection

@section('js_add')
    <script src="{{asset('adminbite/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('adminbite/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('adminbite/dist/js/pages/forms/select2/select2.init.js')}}"></script>
@endsection
