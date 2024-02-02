@extends('layouts.app')

@section('title', 'Storage')

@section('content')
    <div>
        <div class="m-4">
            <x-link> @slot('link', 'index') @slot('name', 'Home') </x-link>
        </div>
        <form method="POST" action="{{ route('store') }}"
            class="flex flex-col space-y-6 items-center border border-slate-800 max-w-max p-5 m-2"
            enctype="multipart/form-data">
            @csrf
            <x-inputText>
                @slot('name', 'name-file')
            </x-inputText>

            <label class="block">
                <span class="sr-only hover:cursor-pointer">Choose profile photo</span>
                <input type="file" name="path-file"
                    class="block w-full text-sm text-slate-500
        file:mr-4 file:py-2 file:px-4
        file:rounded-full file:border-0
        file:text-sm file:font-semibold
        file:bg-violet-50 file:text-violet-700
        hover:file:bg-violet-100
        hover:cursor-pointer
      " />
                @error('path-file')
                    <span class="text-red-500 text-xs"> Formato incompatible </span>
                @enderror
            </label>


            <button>Save</button>

        </form>
    </div>
@endsection
