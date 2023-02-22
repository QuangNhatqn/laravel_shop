@extends('adminlayouts.layouts.admin')

@section('title')
    <title>Edit User</title>
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
            @include('adminlayouts.partials.content-header', ['name' => 'User', 'key' => 'Edit', 'link' => route('users.index')])

            <form class="form-horizontal r-separator" action="{{route('users.update', ['id'=>$user->id])}}"
                  method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="card-body bg-light">
                    <div class="form-group row align-items-center m-b-0">
                        <label for="name" class="col-3 text-right control-label col-form-label">
                            Name</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="name"
                                   name="name"
                                   value="{{$user->name}}"
                                   placeholder="User Name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0">
                        <label for="email" class="col-3 text-right control-label col-form-label">
                            Email</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email"
                                   name="email"
                                   value="{{$user->email}}"
                                   placeholder="Email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0">
                        <label for="password" class="col-3 text-right control-label col-form-label">
                            Password</label>
                        <div class="col-9 border-left p-b-10 p-t-10 ">
                            <div class="input-group">
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       name="password"
                                       value=""
                                       placeholder="Password">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btn-show-pw" type="button">Show</button>
                                </div>
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0 @error('role_id') is-invalid @enderror">
                        <label for="role_id" class="col-3 text-right control-label col-form-label">
                            Role</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <select class="select2 form-control "
                                    multiple="multiple"
                                    style="height: 36px;width: 100%;"
                                    name="role_id[]">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}"
                                        {{$rolesOfUser->contains('id', $role->id) ? 'selected' : ''}}>
                                        {{$role->name}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group m-b-0 text-right">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                        <a href="{{route('users.index')}}"
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
    <script src="{{asset('adminbite/assets/custom/users/js/useradd.js')}}"></script>
@endsection





