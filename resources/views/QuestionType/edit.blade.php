@extends('layouts.admin-portal')

@section('title', 'Edit Question Type')

@section('header')
    <h2>Edit Question Type</h2>
@endsection

@section('main')
    <form class="grid-x grid-padding-x grid-padding-y bg-white px-2" method="POST" action="{{route('questiontype.update', $questiontype)}}">
        @method('PUT')
        @csrf
        @if (count($errors) > 0)
            <div class="cell small-12 callout alert mx-4 my-4">
                <strong>Please fix these errors before continuing</strong>
                <ul>
                    @foreach($errors->all() as $errorMessage)
                        <li>{{$errorMessage}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label for="questiontype" class="cell small-12 medium-2 font-bold" style="padding-bottom: 0">Name</label>
        <div class="cell small-12 medium-10">
            <input id="questiontype" name="name" type="text" class="my-0" required value="{{$questiontype->name}}">
        </div>
        <div class="cell small-6 medium-3">
            <button class="button expanded primary my-0" type="submit">Save</button>
        </div>
        <div class="cell small-6 medium-3 medium-offset-6">
            <a class="button expanded secondary my-0" href="{{url()->previous()}}">Cancel</a>
        </div>
    </form>
@endsection
