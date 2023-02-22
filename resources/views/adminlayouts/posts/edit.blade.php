@extends('adminlayouts.layouts.admin')

@section('title')
    <title>Edit Post</title>
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
            @include('adminlayouts.partials.content-header', ['name' => 'Post', 'key' => 'Edit', 'link' => route('posts.index')])
            <form class="form-horizontal r-separator" action="{{route('posts.update', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body bg-light">
                    <div class="form-group row align-items-center m-b-0">
                        <label for="title" class="col-3 text-right control-label col-form-label">Post title</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title"
                                   name="title"
                                   value="{{$post->title}}"
                                   placeholder="Title post">
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0">
                        <label for="slug" class="col-3 text-right control-label col-form-label">Url</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                   id="slug" name="slug"
                                   value="{{$post->slug}}"
                                   placeholder="Url">
                            @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0">
                        <label for="feature_image_path" class="col-3 text-right control-label col-form-label">Feature Image</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <div class="input-group mb-3" style="margin: 0 !important;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input  @error('feature_image_path') is-invalid @enderror" id="feature_image_path" name="feature_image_path">
                                    <label class="custom-file-label" for="feature_image_path">Choose file</label>
                                </div>
                            </div>
                            @error('feature_image_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="img-fluid image-product" src="{{Storage::url($post->feature_image_path)}}"
                                             alt="{{$post->feature_image_name}}"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0">
                        <label for="tag" class="col-3 text-right control-label col-form-label">Tags</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <select class="form-control select2-with-tokenizer" multiple="" id="tag" style="width: 100%;height: 36px;" name="tag[]">
                                @foreach($post->tags as $tag)
                                    <option selected>{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row align-items-center m-b-0 @error('category_id') is-invalid @enderror">
                        <label for="category_id" class="col-3 text-right control-label col-form-label">Category</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                            <select class="select2 form-control custom-select "
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

                    <div class="form-group row align-items-center m-b-0">
                        <label for="contents" class="col-3 text-right control-label col-form-label">Content</label>
                        <div class="col-9 border-left p-b-10 p-t-10">
                        </div>
                    </div>
                    <div class="form-group">
                                <textarea id="contents" name="contents" class="form-control" rows="20"
                                          placeholder="Content...">
                                    {{$post->content}}
                                </textarea>
                        @error('contents')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
                <div class="card-body">
                    <div class="form-group m-b-0 text-right">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                        <a href="{{route('posts.index')}}" class="btn btn-dark waves-effect waves-light">Cancel</a>
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
        path_absolute : "/",
        selector: "textarea#contents",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>
@endsection





