<div class="row">
    @can($model_name . '-add')
    <a href="{{ route($model_names . '.create') }}"
       class="btn btn-outline-info float-left m-2">ADD</a>
    @endcan
</div>
