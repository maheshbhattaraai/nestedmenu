<ul>
    @foreach($childs as $child)
    <li>
        {{ $child->name }}
    @if(count($child->childs))
                @include('menuchild',['childs' => $child->childs])
            @endif
    </li>
    @endforeach
</ul>