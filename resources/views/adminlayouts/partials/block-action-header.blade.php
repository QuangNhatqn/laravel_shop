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
    <div class="float-left m-2 count-selected-item child-block-action"></div>
</div>
