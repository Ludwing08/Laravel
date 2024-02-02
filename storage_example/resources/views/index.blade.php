@extends('layouts.app')

@section('content')
    <x-link> @slot('link', 'create') @slot('name', 'Create')</x-link>

    <div class="text-2xl underline-offset-2 text-center">
        <strong>Files</strong>
        <div>
            <ul>
                @forelse ($infos as $info)
                    <li>
                        <img class="object-center w-1/12 max-h-40" src="{{ asset('storage/'.$info->path_file) }}"
                            >
                    </li>
                @empty
                    <li>No data</li>
                @endforelse
            </ul>
        </div>

    </div>
@endsection
