<div>
        @foreach (Config::get('language') as $lang =>  $language )
            @if ($lang != App::getLocale())
                <a href="{{ route('lang', ['lang' => $lang] ) }}"> {{$language}} </a>
            @endif            
        @endforeach
</div>