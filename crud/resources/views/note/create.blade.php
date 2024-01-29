@extends('layouts.app')

@section('title', 'Create note')

@section('content')

    <a href="{{ route('note.index') }}"> Back </a>

    <form method="POST" action="{{ route('note.store') }}">
        @csrf
        <label for="title">Title</label>        
        <input type="text" name="input-title" id=""> <br/>
        @error('input-title')
            <p style="color: red"> {{ $message}} </p>            
        @enderror

        <label for="description">Description</label> 
        <input type="text" name="input-description" id=""> <br/>        
        @error('input-description')
            <p style="color: red"> {{ $message}} </p>            
        @enderror

        <button type="submit">Create</button>
    </form>

@endsection