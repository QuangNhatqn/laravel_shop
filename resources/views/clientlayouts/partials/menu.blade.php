@foreach($menus as $menu)
    <ul class="nav navbar-nav collapse navbar-collapse">

        <li class="dropdown"><a
                href="#">{{$menu->name}}{!!$menu->menuChilds->count() ? '<i class="fa fa-angle-down"></i>' : '' !!}</a>

            @if($menu->menuChilds->count())
                @include('clientlayouts.partials.menuChild', ['childs' => $menu->menuChilds])
            @endif

        </li>

    </ul>
@endforeach
