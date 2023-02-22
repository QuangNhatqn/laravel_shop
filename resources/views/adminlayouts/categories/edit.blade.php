@extends('adminlayouts.layouts.admin')

@section('title')
    <title>Edit {{ucwords($category->type)}} Category</title>
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
            @include('adminlayouts.partials.content-header', ['name' =>  ucwords($category->type) . ' Category', 'key' => 'Edit', 'link' => route('categories.index', ['type' => $category->type])])

            <form class="form-horizontal r-separator" action="{{route('categories.update', ['id' => $category->id])}}"
                  method="post">
                @csrf
                <div class="card-body bg-light">
                    <div class="form-group row align-items-center m-b-0">
                        <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Category</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$category->name}}"
                                   placeholder="Category Name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center m-b-0">
                        <label for="slug" class="col-3 text-right control-label col-form-label">Url</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="Example: tin-tuc"
                                   value="{{$category->slug}}">
                            @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center m-b-0 @error('parent_id') is-invalid @enderror">
                        <label for="parent_id" class="col-3 text-right control-label col-form-label">Parent
                            Category</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <select
                                class="select2 form-control custom-select"
                                style="width: 100%; height:36px;"
                                name="parent_id"
                                id="parent_id">
                                <option value="0">Select Parent Category</option>
                                {!!$htmlOption!!}
                            </select>
                            @error('parent_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center m-b-0">
                        <label for="description"
                               class="col-3 text-right control-label col-form-label">Description</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <textarea class="form-control" rows="3"
                                      name="description" id="description"
                                      placeholder="Description">{{$category->description}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div style="display: none"><input name="type" value="{{$category->type}}"></div>
                <div class="card-body">
                    <div class="form-group m-b-0 text-right">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                        <a href="{{route('categories.index', ['type' => $category->type])}}"
                           class="btn btn-dark waves-effect waves-light">Cancel</a>
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




