@extends('adminlayouts.layouts.admin')

@section('title')
<title>Admin Home</title>
@endsection
@section('content')
    <div class="page-wrapper">

        <div class="container-fluid">
            @include('adminlayouts.partials.content-header', ['name' => 'Dashboard', 'key' => 'Home', 'link' => 'home'])

            <div class="row">
                <div class="col-lg-12">
                    <div class="card  bg-light no-card-border">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="m-r-10">
                                    <img src="{{asset('adminbite/assets/images/users/2.jpg')}}" alt="user" width="60" class="rounded-circle" />
                                </div>
                                <div>
                                    <h3 class="m-b-0">Welcome back!</h3>
                                    <span>{{date("D, d F Y")}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
{{--                Trang Chủ--}}
            </div>

        </div>

    </div>
@endsection





