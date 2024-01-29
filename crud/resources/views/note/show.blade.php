@extends('layouts.app')

@section('content')
    <a href="{{route('note.index')}}">Back</a>
        <h3> {{$note->title}} </h3>    
        <p> {{$note->description}}</p>
@endsection