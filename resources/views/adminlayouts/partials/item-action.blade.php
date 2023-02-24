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

    @case('setting')
    @can($model_name . '-update', $model->id)
        <a href="{{route($model_names . '.edit', ['id'=>$model->id, 'type' => $model->type])}}"
           class="btn btn-default">Edit</a>
    @endcan
    @can($model_name . '-delete', $model->id)
        <a href=""
           data-url="{{route($model_names . '.delete', ['id' => $model->id])}}"
           class="btn btn-danger action_delete">Delete</a>
    @endcan

    @break

    @default

@endswitch
