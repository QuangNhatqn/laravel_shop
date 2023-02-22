<!-- Nav tabs -->
<div class="nav-custom">
    <ul class="subsubsub">
        <li class="all"><a href="{{route($model_names . '.index')}}"
                           class="@if(empty($post_status)) current @endif ">All <span
                    class="count">({{$countAll}})</span></a>
        </li>

        @if(!empty($countTrash))
        <li class="trash">|<a href="{{route($model_names. '.index') . '?post_status=trash'}}"
                             class="@if($post_status == 'trash') current @endif"
                             aria-current="page">Trash <span
                    class="count">({{$countTrash}})</span></a>
        </li>
        @endif
    </ul>
</div>
