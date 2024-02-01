@extends('layouts.app')

@section('title', 'Livewire example')

@section('content')

    @livewire('counter')
    {{-- <livewire:counter> </livewire:counter> --}}
    <livewire:note-form></livewire:note-form>
@endsection