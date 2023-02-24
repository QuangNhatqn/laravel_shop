@extends('adminlayouts.layouts.admin')

@section('title')
    <title>Add Product</title>
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
            @include('adminlayouts.partials.content-header', ['name' => 'Product', 'key' => 'Add', 'link' => route('products.index')])
            <form class="form-horizontal r-separator" action="{{route('products.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf

                <div class="card-body bg-light">
                    <div class="form-group row align-items-center m-b-0">
                        <label for="name" class="col-3 text-right control-label col-form-label">Product Name</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" value="{{old('name')}}" placeholder="Product Name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0">
                        <label for="price" class="col-3 text-right control-label col-form-label">Price</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                                   name="price" value="{{old('price')}}" placeholder="Price">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0">
                        <label for="feature_image_path" class="col-3 text-right control-label col-form-label">Feature
                            Image</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <div class="input-group mb-3" style="margin: 0 !important;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file"
                                           class="custom-file-input @error('feature_image_path') is-invalid @enderror"
                                           id="feature_image_path"
                                           name="feature_image_path"
                                           value="">
                                    <label class="custom-file-label" for="feature_image_path">Choose file</label>
                                </div>
                            </div>
                            @error('feature_image_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0">
                        <label for="image_path" class="col-3 text-right control-label col-form-label">Image
                            Details</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <div class="input-group mb-3" style="margin: 0 !important;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file"
                                           class="custom-file-input @if(!empty($errors->get('image_path')) || !empty($errors->get('image_path.*')))is-invalid @endif"
                                           id="image_path"
                                           name="image_path[]"
                                           value="" multiple>
                                    <label class="custom-file-label" for="image_path">Choose multiple file</label>
                                </div>
                            </div>
                            @if(!empty($errors->get('image_path')))
                                @error('image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @elseif(!empty($errors->get('image_path.*')))
                                @error('image_path.*')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @endif

                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0">
                        <label for="tag" class="col-3 text-right control-label col-form-label">Tags</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <select class="form-control select2-with-tokenizer" multiple="" id="tag"
                                    style="width: 100%;height: 36px;" name="tag[]">
                            </select>
                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0 @error('category_id') is-invalid @enderror">
                        <label for="category_id" class="col-3 text-right control-label col-form-label">Category</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <select class="select2 form-control custom-select"
                                    style="width: 100%; height:36px;"
                                    name="category_id"
                                    id="category_id">
                                <option value="">Select Category</option>
                                {!!$htmlOption!!}
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


{{--                    <div class="form-group row align-items-center m-b-0">--}}
{{--                        <label for="contents" class="col-3 text-right control-label col-form-label">Extra</label>--}}
{{--                        <div class="col-9 border-left p-b-10 p-t-10">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body">--}}
{{--                                    <h4 class="card-title">Vertical Tabs</h4>--}}
{{--                                    <h6 class="card-subtitle">Use default tab with class <code>nav-tabs &amp; tabcontent-border </code></h6>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-lg-4 col-xl-3">--}}
{{--                                            <!-- Nav tabs -->--}}
{{--                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">--}}
{{--                                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>--}}
{{--                                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>--}}
{{--                                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>--}}
{{--                                                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-8 col-xl-9">--}}
{{--                                            <div class="tab-content" id="v-pills-tabContent">--}}
{{--                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">.--}}
{{--                                                    <p> Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>--}}
{{--                                                    Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.--}}
{{--                                                </div>--}}
{{--                                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">.--}}
{{--                                                    <p> Probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. </p>--}}
{{--                                                    <p> Probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. </p>--}}
{{--                                                </div>--}}
{{--                                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">.--}}
{{--                                                    <p> Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>--}}
{{--                                                    Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.--}}
{{--                                                </div>--}}
{{--                                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">.--}}
{{--                                                    <p> Probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. </p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}




                    <div class="form-group row align-items-center m-b-0">
                        <label for="contents" class="col-3 text-right control-label col-form-label">Content</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                        </div>
                    </div>
                    <div class="form-group">
                                <textarea id="contents" name="contents"
                                          class="form-control @error('contents') is-invalid @enderror" rows="20"
                                          placeholder="Content...">
                                    {{old('contents')}}
                                </textarea>
                        @error('contents')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
                <div class="card-body">
                    <div class="form-group m-b-0 text-right">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                        <a href="{{route('products.index')}}" class="btn btn-dark waves-effect waves-light">Cancel</a>
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

    <script src="{{asset('adminbite/assets/libs/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('adminbite/assets/libs/tinymce/themes/modern/theme.min.js')}}"></script>
    <script>
        var editor_config = {
            path_absolute: "/",
            selector: "textarea#contents",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
@endsection





