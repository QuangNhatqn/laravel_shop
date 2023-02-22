@extends('adminlayouts.layouts.admin')

@section('title')
    <title>Edit Permission</title>
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
            @include('adminlayouts.partials.content-header', ['name' => 'Permission', 'key' => 'Edit', 'link' => route('permissions.index')])

            <form class="form-horizontal r-separator" action="{{route('permissions.update', ['id' => $permission->id])}}" method="post">
                @csrf
                <div class="card-body bg-light">
                    <div class="form-group row align-items-center m-b-0">
                        <label for="module_name" class="col-3 text-right control-label col-form-label">Module</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <select class="select2 form-control custom-select @error('module_name') is-invalid @enderror"
                                    style="width: 100%; height:36px;" name="module_name" id="module_name">
                                <option value="">Select Module</option>
                                @foreach(config('permissions.table_module') as $module_name)

                                    @if(ucwords($module_name) == $permission->permissionParent->name)
                                        <option value="{{$module_name}}" selected>{{ucwords($module_name)}}</option>
                                    @else
                                        <option value="{{$module_name}}">{{ucwords($module_name)}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('module_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center m-b-0">
                            <label for="name" class="col-3 text-right control-label col-form-label">Permission Name</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" value="{{$permission->name}}" placeholder="Permission Name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center m-b-0">
                        <label for="display_name" class="col-3 text-right control-label col-form-label">Permission Display Name</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <input type="text" class="form-control @error('display_name') is-invalid @enderror"
                                   id="display_name" name="display_name" value="{{$permission->display_name}}" placeholder="Permission Display Name">
                            @error('display_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center m-b-0">
                        <label for="key_code" class="col-3 text-right control-label col-form-label">Key Code</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <input type="text" class="form-control @error('key_code') is-invalid @enderror"
                                   id="key_code" name="key_code" value="{{$permission->key_code}}" placeholder="If field empty, key code auto generate">
                            @error('key_code')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <div class="form-group m-b-0 text-right">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                        <a href="/admin/home" class="btn btn-dark waves-effect waves-light">Cancel</a>
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





