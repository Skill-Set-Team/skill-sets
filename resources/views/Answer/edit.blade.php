@extends('layouts.admin-portal')

@section('title', 'Edit Answer')

@section('header')
    <h2>Edit Answer</h2>
@endsection

@section('main')
    <form class="grid-x grid-padding-x grid-padding-y bg-white px-2" method="POST" action="{{route('answer.update', $answer)}}">
        @csrf
        @method('PUT')
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

        <label for="exercise" class="cell small-12 medium-2 font-bold" style="padding-bottom: 0">Exercise</label>
        <div class="cell small-12 medium-10">
            @php
                $exercise = $answer->exercise;
                $maxQuestionLength = 80;
            @endphp
            <a id="exercise" href="{{route('exercise.show', $exercise)}}">
                @if(strlen($exercise->question) > $maxQuestionLength)
                    {{substr($exercise->question, 0, $maxQuestionLength)}}...
                @else
                    {{$exercise->question}}
                @endif
            </a>
        </div>

        <label for="solution" class="cell small-12 medium-2 font-bold" style="padding-bottom: 0">Solution</label>
        <div class="cell small-12 medium-10">
            <input id="solution" name="solution" type="text" class="my-0" required value="{{$answer->solution}}">
        </div>

        <label for="isCorrect" class="cell small-12 medium-2">Correct</label>
        <div class="cell small-12 medium-10">
            <input id="isCorrect" name="isCorrect" class="switch-input" type="checkbox" @if($answer->isCorrect) checked @endif >
            <label class="switch-paddle" for="isCorrect">
                <span class="show-for-sr">Answer is correct</span>
            </label>
        </div>

        <div class="cell small-6 medium-3">
            <button class="button expanded primary my-0" type="submit">Save</button>
        </div>
        <div class="cell small-6 medium-3 medium-offset-6">
            <a class="button expanded secondary my-0" href="{{url()->previous()}}">Cancel</a>
        </div>
    </form>
@endsection
