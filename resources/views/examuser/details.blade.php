@extends('layouts.app')

@section('content')
    @foreach ($questions as $key => $question)
        <p><b>Question:</b {{ $question->question }}</p>
    @endforeach
@endsection
