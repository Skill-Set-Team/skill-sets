@extends('layouts.admin-portal')

@section('title', 'Answer details')

@section('header')
    <h2>Answer details</h2>
@endsection
@section('main')
    <div class="grid-x grid-margin-x bg-white">
        <dl class="cell grid-x grid-padding-x py-3 gap-y-2">
            <dt class="cell small-12 medium-2 font-bold">Exercise</dt>
            <dd class="cell small-12 medium-9">
                <a href="{{route('exercise.show', $exercise)}}">
                    @php $maxQuestionLength = 80; @endphp
                    @if(strlen($exercise->question) > $maxQuestionLength)
                        {{substr($exercise->question, 0, $maxQuestionLength)}}...
                    @else
                        {{$exercise->question}}
                    @endif
                </a>
            </dd>
            <dt class="cell small-12 medium-2 font-bold">Solution</dt>
            <dd class="cell small-12 medium-9">{{$answer->solution}}</dd>
            <dt class="cell small-12 medium-2 font-bold">Correct</dt>
            <dd class="cell small-12 medium-9">@if($answer->isCorrect) Yes @else No @endif</dd>
        </dl>
        <div class="cell small-12 medium-3">
            <a class="button expanded success" href="{{route('answer.edit', $answer)}}">Edit</a>
        </div>
        <div class="cell small-12 medium-3">
            <a class="button expanded alert" href="{{route('answer.delete', $answer)}}">Delete</a>
        </div>
        <div class="cell small-12 medium-3 medium-offset-3">
            <a class="button expanded secondary" href="{{route('exercise.show', $exercise)}}">View exercise</a>
        </div>
    </div>
@endsection
