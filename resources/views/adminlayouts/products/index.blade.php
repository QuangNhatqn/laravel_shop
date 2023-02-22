@extends('adminlayouts.layouts.admin')

@section('title')
    <title>{{ucwords($model_name)}} List</title>
@endsection

@section('css_custom_add')
 <link rel="stylesheet" href="{{asset('adminbite/assets/custom/css/adminindex.css')}}">
@endsection

@section('content')
    <div class="page-wrapper">

        <div class="container-fluid">
            @include('adminlayouts.partials.content-header', ['name' => ucwords($model_name), 'key' => 'List', 'link' => route($model_names . '.index')])

            @include('adminlayouts.partials.button-add-header')

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @include('adminlayouts.partials.nav-tab')
                            @include('adminlayouts.partials.block-action-header')

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-info text-white">
                                    <tr>
                                        <th scope="col">
                                            <input class="check-all-page" type="checkbox" value="all">
                                        </th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($models as $model)
                                    <tr>
                                        <th {{$model_name}}-id="{{$model->id}}" scope="row">
                                            <fieldset class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="list_selected[]"
                                                           value="{{$model->id}}">
                                                </label>
                                            </fieldset>
                                        </th>
                                        <td >{{$model->name}}</td>
                                        <td >{{number_format($model->price)}}</td>
                                        <td ><img class="img-page-list" src="{{Storage::url($model->feature_image_path)}}"></td>
                                        <td category-id="{{optional($model->categories)->id}}">{{optional($model->categories)->name}}</td>
                                        <td>
                                            @switch($post_status)
                                                @case('')
                                                @can($model_name . '-update', $model->id)
                                                    <a href="{{route($model_names . '.edit', ['id'=>$model->id])}}"
                                                       class="btn btn-default">Edit</a>
                                                @endcan
                                                @can($model_name . '-delete', $model->id)
                                                    <a href=""
                                                       data-url="{{route($model_names . '.delete', ['id' => $model->id])}}"
                                                       class="btn btn-danger action_delete">Delete</a>
                                                @endcan
                                                @break

                                                @case('trash')
                                                @can($model_name . '-delete', $model->id)
                                                    <a href=""
                                                       data-url="{{route($model_names . '.recovery')}}"
                                                       class="btn btn-default action_recovery">Recovery</a>
                                                    <a href=""
                                                       data-url="{{route($model_names . '.remove-trash')}}"
                                                       class="btn btn btn-danger action_remove_trash">Remove
                                                        Trash</a>
                                                @endcan
                                                @break

                                                @default

                                            @endswitch
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{$models->links()}}
                </div>
            </div>

        </div>

    </div>
@endsection

@section('js_add')
    <script src="{{asset('adminbite/assets/custom/js/sweetarlet2.js')}}"></script>
    <script src="{{asset('adminbite/assets/custom/js/adminindex.js')}}"></script>
@endsection
