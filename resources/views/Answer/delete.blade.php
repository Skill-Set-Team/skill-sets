@extends('layouts.admin-portal')

@section('title', 'Deleting answer')

@section('header')
    <h2>Delete answer</h2>
@endsection
@section('main')
    <div class="grid-x grid-margin-x bg-white max-w-3xl mx-auto sm:px-6 lg:px-8">
        <form class="grid-x grid-padding-x" method="post" action="{{route('answer.destroy', $answer)}}">
            @csrf
            @method('DELETE')
            <h3 class="cell small-12 text-center">Deleting answer<br/>
                <a class="font-bold" href="{{route('answer.show', $answer)}}">
                    @php $maxAnswerLength = 50; @endphp
                    @if(strlen($answer->solution) > $maxAnswerLength)
                        {{substr($answer->solution, 0, $maxAnswerLength)}}...
                    @else
                        {{$answer->solution}}
                    @endif
                </a>
            </h3>
            <div class="cell small-12 text-center text-sm text-gray-800 py-3">
                for exercise<br/>
                <a class="font-bold" href="{{route('exercise.show', $answer)}}">
                    @php $maxQuestionLength = 60; $question = $answer->exercise->question; @endphp
                    @if(strlen($question) > $maxQuestionLength)
                        {{substr($question, 0, $maxQuestionLength)}}...
                    @else
                        {{$question}}
                    @endif
                </a>
            </div>
            <p class="cell small-12 text-center my-2">Are you sure you want to delete this answer?</p>
            <div class="cell small-5 medium-4">
                <button class="button alert expanded" type="submit">Delete</button>
            </div>
            <div class="cell small-5 small-offset-1 medium-4 medium-offset-4">
                <a class="button secondary expanded" href="{{url()->previous()}}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
