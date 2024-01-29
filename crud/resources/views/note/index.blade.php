@extends('layouts.app')

@section('title', 'Notes')

@section('content')

    <button> <a href="{{ route('note.create') }}"> Create new </a></button>

    <table border="1">
        @forelse ($notes as $note)
            <tr>

                <td><a href="{{ route('note.show', ['note' => $note->id]) }}"> {{ $note->title }} </a> </td>

                <td> <a href=" {{ route('note.edit', ['note' => $note->id]) }} "> <Button>Edit</Button> </a> </td>
                <td>
                    <form action="{{ route('note.delete', ['note' => $note->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                    </form>
                </td>

            </tr>
        @empty
            <strong> No hay datos </strong>
        @endforelse

    </table>
@endsection
