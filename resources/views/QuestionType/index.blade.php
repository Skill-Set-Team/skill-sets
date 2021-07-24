@extends('layouts.admin-portal')

@section('title', 'Question Types')

@section('header')
    <h2>All Question Types</h2>
@endsection
@section('main')
    <table>
        <tr>
            <th>Name</th>
            <th><span class="show-for-sr">Actions</span></th>
        </tr>
        @forelse($questionTypes as $questiontype)
            <tr>
                <td class="text-center">{{$questiontype->name}}</td>
                <td>
                    <div class="stacked-for-small expanded button-group" style="margin: 0">
                        <a class="button" href="{{route('questiontype.show', $questiontype)}}">View</a>
                        <a class="button success" href="{{route('questiontype.edit', $questiontype)}}">Edit</a>
                        <form method="POST" action="{{route('questiontype.destroy', $questiontype)}}">
                            @method('DELETE')
                            @csrf
                            <button class="button alert" type="submit">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No question types found. You can <a href="{{route('questiontype.create')}}">add a question type.</a>!</td>
            </tr>
        @endforelse
    </table>
@endsection
