@extends('adminlayouts.layouts.admin')

@section('title')
    <title>Add Setting</title>
@endsection

@section('css_custom_add')
    <link rel="stylesheet" type="text/css" href="{{asset('adminbite/assets/custom/css/admintalert.css')}}"/>
@endsection

@section('content')
    <div class="page-wrapper">

        <div class="container-fluid">
            @include('adminlayouts.partials.content-header', ['name' => 'Setting', 'key' => 'Add', 'link' => route('settings.index')])

            <form class="form-horizontal r-separator" action="{{route('settings.store') . '?type=' . request()->type}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="card-body bg-light">
                    <div class="form-group row align-items-center m-b-0">
                        <label for="config_key" class="col-3 text-right control-label col-form-label">Config Key</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <input type="text" class="form-control @error('config_key') is-invalid @enderror" id="config_key"
                                   name="config_key" value="{{old('config_key')}}" placeholder="Example: phone-number">
                            @error('config_key')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0">
                        <label for="config_value" class="col-3 text-right control-label col-form-label">Config Value</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            @if(request()->type === 'Text' )
                                <input type="text" class="form-control @error('config_value') is-invalid @enderror" id="config_value"
                                       name="config_value" value="{{old('config_value')}}" placeholder="Config Value">
                            @elseif(request()->type === 'Textarea')
                                <textarea class="form-control @error('config_value') is-invalid @enderror" rows="5"
                                          name="config_value" id="config_value"
                                          placeholder="Config Value...">{{old('config_value')}}</textarea>
                            @endif
                                @error('config_value')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group m-b-0 text-right">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                        <a href="{{route('settings.index')}}"
                           class="btn btn-dark waves-effect waves-light">Cancel</a>
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection





