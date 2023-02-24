@extends('errors.errorlayout')

@section('title')
    <title>400 - Page Not Found !</title>
@endsection

@section('error-box')
    <div class="error-box">
        <div class="error-body text-center">
            <h1 class="error-title">400</h1>
            <h3 class="text-uppercase error-subtitle">Page Not Found !</h3>
            <p class="text-muted m-t-30 m-b-30">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</p>
            <a href="/" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Back to home</a> </div>
    </div>
@endsection

