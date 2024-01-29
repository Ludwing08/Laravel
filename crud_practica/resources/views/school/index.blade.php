@extends('layouts.app')
@section('title', 'Schools')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
@endsection

@section('content')

    <div class="new">

        <a href=" {{ route('school.create') }} " class="button-create"> <i class="fa-solid fa-plus"></i> New School </a>
    </div>

    @if (!empty($schools))

        <div class="content">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Number of students</th>
                    <th> Actions </th>
                </tr>
                @forelse ($schools as $school)
                    <tr class="row" data-href="{{ route('school.show', ['school' => $school->id]) }}">
                        <td class="row-item">

                            {{ $school->name }}

                        </td>
                        <td class="row-item">
                            {{ $school->description }}
                        </td>
                        <td class="row-item">
                            {{ $school->cant_student }}
                        </td>
                        <td>
                            <div class="actions">
                                <a href=" {{ route('school.edit', ['school' => $school->id]) }} "> <button  class="btn-actions"> <i
                                        class="fa-solid fa-pen-to-square"></i> </button> </a>
                                <form action="{{ route('school.destroy', ['school' => $school->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn-actions"> <i class="fa-solid fa-trash"></i>  </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @empty
                    <div>
                        No hay datos
                    </div>
                @endforelse
                <tfoot>
                    <tr>
                        <td colspan="2"> <strong> Total Sum </strong></td>
                        <td><strong> {{ $sum }} </strong> </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    @endif


@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('tbody tr.row').on('click', function() {
            window.location = $(this).data('href');
        });
    });
</script>
