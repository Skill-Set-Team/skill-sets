@extends('layouts.admin-portal')

@section('title', 'Question Type details')

@section('header')
    <h2>Question Type details</h2>
@endsection
@section('main')
    <div class="grid-x grid-margin-x bg-white">
        <dl class="cell grid-x grid-padding-x py-3 gap-y-2">
            <dt class="cell small-12 medium-2 font-bold">Name</dt>
            <dd class="cell small-12 medium-9">{{$questiontype->name}}</dd>
        </dl>
        <div class="cell small-12 medium-3 medium-offset-3">
            <a class="button expanded secondary" href="{{route('questiontype.index')}}">All Question Types</a>
        </div>
    </div>
@endsection
