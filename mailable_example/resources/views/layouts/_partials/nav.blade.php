<div>
    <ul>
        @foreach ($items as $item)
            <li> <a href=" {{ $item['route'] }} ">{{ $item['name'] }} </a> </li>
        @endforeach
    </ul>
</div>