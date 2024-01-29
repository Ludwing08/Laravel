@extends('layouts.app')
@section('title', 'Schools')
@section('style')
<link rel="stylesheet" href=" {{asset('assets/css/form.css')}} ">
@endsection
    

@section('content')
<div class="new">
    <a href=" {{ route('school') }} " class="btn-warning"> <i class="fa-solid fa-arrow-left"></i> Back </a>
</div>

<div class="content">
<form action="{{ route('school.store') }}" method="POST" class="form-create">    
    @csrf
    <div class="input-form">
        <label for="name" > <i class="fa-solid fa-school-flag"></i> </label>
        
        <input type="text" name="name" id="name" placeholder="Enter the school">
    </div>
    <div class="input-form">
        <i class="fa-solid fa-audio-description"></i>
        <textarea rows="4" name="description" id="description" placeholder="Description of the school"></textarea>
    </div>
    <div class="input-form">
        <i class="fa-solid fa-people-roof"></i>
        <input type="number" name="cant_student" id="cant_student" placeholder="Number of student">
    </div>

    <button type="submit" class="btn-save"> Create</button>
</form>
</div>
@endsection

