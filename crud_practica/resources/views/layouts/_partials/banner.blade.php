<link rel="stylesheet" href="{{ asset('assets/css/banner.css') }}">


    @if ($message = Session::get('SUCCESS'))
    <div class="banner">
        <i class="fa fa-check-circle" aria-hidden="true"></i>
        {{ $message }}
    </div>
    @endif

    @if ($message = Session::get('UPDATE'))
    <div class="banner">
        <i class="fa fa-edit    "></i>
        {{ $message }}
    </div>
    @endif

    @if ($message = Session::get('DELETE'))
    <div class="banner">
        <i class="fa fa-trash" aria-hidden="true"></i>
        {{ $message }}
    </div>
    @endif
