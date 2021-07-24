@extends('layouts.admin-portal')

@section('title', 'Exercise details')

@section('header')
    <h2>Exercise details</h2>
@endsection
@section('main')
    <div class="grid-x grid-margin-x bg-white">
        <dl class="cell grid-x grid-padding-x py-3 gap-y-2">
            <dt class="cell small-12 medium-2 font-bold">Question</dt>
            <dd class="cell small-12 medium-9">{{$exercise->question}}</dd>
            <dt class="cell small-12 medium-2 font-bold">Question type</dt>
            <dd class="cell small-12 medium-9">{{$exercise->questionType->name}}</dd>
        </dl>
        <div class="cell small-12 medium-3">
            <a class="button expanded success" href="{{route('exercise.edit', $exercise)}}">Edit</a>
        </div>
        <div class="cell small-12 medium-3">
            <a class="button expanded alert" href="{{route('exercise.delete', $exercise)}}">Delete</a>
        </div>
        <div class="cell small-12 medium-3 medium-offset-3">
            <a class="button expanded secondary" href="{{route('exercise.index')}}">All exercises</a>
        </div>
    </div>
    <table>
        <caption>Answers</caption>
        <tr>
            <th>Answer</th>
            <th style="width:10ch">Correct</th>
            <th style="width: 20%;"><span class="show-for-sr">Actions</span></th>
        </tr>
        @php $maxAnswerLength = 80; @endphp
        @forelse($exercise->answers as $answer)
            <tr>
                <td>
                    @if(strlen($answer->solution) > $maxAnswerLength)
                        {{substr($answer->solution, 0, $maxAnswerLength)}}...
                    @else
                        {{$answer->solution}}
                    @endif
                </td>
                <td class="text-center">@if($answer->isCorrect)✅@else❌@endif</td>
                <td>
                    <div class="stacked-for-small expanded button-group" style="margin: 0">
                        <a class="button" href="{{route('answer.show', $answer)}}">View</a>
                        <a class="button success" href="{{route('answer.edit', $answer)}}">Edit</a>
                        <a class="button alert" href="{{route('answer.delete', $answer)}}">Delete</a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No answers recorded for this exercise.</td>
            </tr>
        @endforelse
        <tfoot>
        <td colspan="3">
            <a class="button hollow" href="{{route('answer.create', ['exercise'=>$exercise->id])}}">Add answer</a>
        </td>
        </tfoot>
    </table>
@endsection
