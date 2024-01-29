@extends('layouts.app')

@section('content')

<a href="{{ route('note.index')}}"> Back </a>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <ul>
            <li> {{ $error }} </li>
        </ul>        
    @endforeach
@endif
<form action="{{ route('note.update', ['note' => $note->id]) }}" method="POST">
    @method('PUT')
    @csrf
    <label for="title">Title</label>
    <input type="text" name="input-title" id="" value="{{ $note->title }}">

    <label for="description">Description</label>
    <input type="text" name="input-description" id="" value="{{ $note->description }}">

    <button type="submit">Save</button>    
    <button type="">Cancel</button>

</form>
    
@endsection