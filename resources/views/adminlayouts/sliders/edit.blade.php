@extends('adminlayouts.layouts.admin')

@section('title')
    <title>Edit Slider</title>
@endsection

@section('css_custom_add')
    <link rel="stylesheet" type="text/css" href="{{asset('adminbite/assets/custom/css/admintalert.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('adminbite/assets/custom/sliders/css/slideredit.css')}}"/>
@endsection

@section('content')
    <div class="page-wrapper">

        <div class="container-fluid">
            @include('adminlayouts.partials.content-header', ['name' => 'Slider', 'key' => 'Edit', 'link' => route('sliders.index')])

            <form class="form-horizontal r-separator" action="{{route('sliders.update', ['id' => $slider->id])}}"
                  method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="card-body bg-light">
                    <div class="form-group row align-items-center m-b-0">
                        <label for="inputEmail3" class="col-3 text-right control-label col-form-label">Slider
                            Name</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" value="{{$slider->name}}" placeholder="Slider Name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0">
                        <label for="description"
                               class="col-3 text-right control-label col-form-label">Description</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <textarea class="form-control @error('description') is-invalid @enderror" rows="3"
                                      name="description" id="description" name="description"
                                      placeholder="Description Here...">{{$slider->description}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0">
                        <label for="image_path" class="col-3 text-right control-label col-form-label">Image</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <div class="input-group mb-3" style="margin: 0 !important;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file"
                                           class="custom-file-input @error('image_path') is-invalid @enderror"
                                           id="image_path" name="image_path">
                                    <label class="custom-file-label" for="image_path">Choose file</label>
                                </div>
                            </div>
                            @error('image_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="img-fluid image-slider" src="{{Storage::url($slider->image_path)}}"
                                             alt="{{$slider->image_name}}"></div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <div class="form-group m-b-0 text-right">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                        <a href="{{route('sliders.index')}}"
                           class="btn btn-dark waves-effect waves-light">Cancel</a>
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection





