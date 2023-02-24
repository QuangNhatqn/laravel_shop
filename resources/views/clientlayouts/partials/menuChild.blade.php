<ul role="menu" class="sub-menu">
    @foreach($childs as $child)
        <li><a href="#">{{$child->name}}</a></li>
        @if($child->menuChilds->count())
            @include('clientlayouts.partials.menuChild', ['childs' => $child->menuChilds])
        @endif
    @endforeach
</ul>
