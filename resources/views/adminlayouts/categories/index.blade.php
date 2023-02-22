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
            @include('adminlayouts.partials.content-header', ['name' => ucwords($type) . ' ' . ucwords($model_name), 'key' => 'List', 'link' => route($model_names . '.index', ['type' => $type])])

            <div class="row">
                @can($model_name . '-add', $type)
                    <a href="{{ route($model_names . '.create', ['type' => $type]) }}"
                       class="btn btn-outline-info float-left m-2">ADD</a>
                @endcan
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- Nav tabs -->
                            <div class="nav-custom">
                                <ul class="subsubsub">
                                    <li class="all"><a href="{{route($model_names . '.index', ['type' => $type])}}" class="@if(empty($post_status)) current @endif ">All <span
                                                class="count">({{$countAll}})</span></a> |
                                    </li>
                                    <li class="trash"><a href="{{route($model_names . '.index', ['type' => $type]) . '?post_status=trash'}}"
                                                         class="@if($post_status == 'trash') current @endif" aria-current="page">Trash <span class="count">({{$countTrash}})</span></a>
                                    </li>
                                </ul>
                            </div>


                            <div class="block-action">
                                <select class="float-left m-2 child-block-action" id="action_multiple">
                                    <option selected>Action</option>
                                    @switch($post_status)
                                        @case('')
                                            <option data-url="{{route($model_names . '.mutiple-delete')}}" value="delete">
                                                Delete
                                            </option>
                                        @break

                                        @case('trash')
                                            <option data-url="{{route($model_names . '.recovery')}}" value="recovery">
                                                Recovery
                                            </option>
                                            <option data-url="{{route($model_names . '.remove-trash')}}"
                                                    value="remove_trash">
                                                Remove Trash
                                            </option>
                                        @break

                                        @default

                                    @endswitch
                                </select>

                                <a href="#" class="btn btn-info float-left m-2" id="btn_apply">Apply</a>
                                <div class="float-left m-2 count-selected-item child-block-action" ></div>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-info text-white">
                                    <tr>
                                        <th scope="col">
                                            <input class="check-all-page" type="checkbox" value="all">
                                        </th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Url</th>
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
                                            <td>{{$model->name}}</td>
                                            <td>{{$model->description}}</td>
                                            <td>{{$model->slug}}</td>
                                            <td>
                                                @switch($post_status)
                                                    @case('')
                                                    @can($model_name . '-update', $model->id)
                                                        <a href="{{route($model_names . '.edit', ['id'=>$model->id])}}"
                                                           class="btn btn-default">Edit</a>
                                                    @endcan
                                                    @can($model_name . '-delete', $model->id)
                                                        <a href=""
                                                           data-url="{{route($model_names . '.delete', ['id'=>$model->id])}}"
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




