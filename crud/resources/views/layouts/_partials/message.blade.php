@if ($message = Session::get('success'))
    <div style="background-color: green; padding: 15px; color: whitesmoke"> {{ $message }}</div>
@endif

@if ($message = Session::get('danger'))
    <div style="background-color: lightcoral; padding: 15px; color: whitesmoke"> {{ $message }}</div>
@endif