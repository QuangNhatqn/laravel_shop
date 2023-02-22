@extends('adminlayouts.layouts.admin')

@section('title')
    <title>Edit Role</title>
@endsection

@section('css_custom_add')
    <link rel="stylesheet" type="text/css" href="{{asset('adminbite/assets/custom/css/admintalert.css')}}"/>
@endsection

@section('content')
    <div class="page-wrapper">

        <div class="container-fluid">
            @include('adminlayouts.partials.content-header', ['name' => 'Role', 'key' => 'Edit', 'link' => route('roles.index')])

            <form class="form-horizontal r-separator" action="{{route('roles.update', ['id' => $role->id])}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="card-body bg-light">
                    <div class="form-group row align-items-center m-b-0">
                        <label for="name" class="col-3 text-right control-label col-form-label">Role
                            Name</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                value="{{$role->name}}"
                                placeholder="Role Name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0">
                        <label for="display_name"
                               class="col-3 text-right control-label col-form-label">Description</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <textarea class="form-control @error('display_name') is-invalid @enderror"
                                      rows="3"
                                      name="display_name"
                                      id="display_name"
                                      placeholder="Description...">{{$role->display_name}}</textarea>
                            @error('display_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0">
                        <label for="permission"
                               class="col-3 text-right control-label col-form-label">Permission</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input checkbox-all"
                                       id="checkbox-all">
                                <label class="custom-control-label"
                                       for="checkbox-all">All Permisson</label>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            @foreach($permissions as $permission)
                                    <div class="card border-dark">
                                    <div class="card-header bg-dark">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input checkbox-parent"
                                                   id="{{'checkbox' . $permission->id}}"
                                                   value="{{$permission->id}}">
                                            <label class="custom-control-label text-white"
                                                   for="{{'checkbox' . $permission->id}}">{{$permission->name}}</label>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach($permission->permissionChildrent as $perChild)
                                                <div class="col-md-3">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input checkbox-childrent"
                                                               id="{{'checkbox' . $perChild->id}}"
                                                               value="{{$perChild->id}}" name="permission_id[]"
                                                                {{$role->permissions->contains('id', $perChild->id) ? 'checked' : ''}} >
                                                        <label class="custom-control-label"
                                                               for="{{'checkbox' . $perChild->id}}">{{$perChild->name}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
                <div class="card-body">
                    <div class="form-group m-b-0 text-right">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                        <a href="{{route('roles.index')}}"
                           class="btn btn-dark waves-effect waves-light">Cancel</a>
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection
@section('js_add')
    <script src="{{asset('adminbite/assets/custom/roles/js/roleadd.js')}}"></script>
@endsection





