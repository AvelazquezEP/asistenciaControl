@extends('layouts.app')

@section('content')
    <p>{{ $scheduler->title }}</p>
    <p>{{ $scheduler->start_time }}</p>
    <p>{{ $scheduler->finish_time }}</p>
    <p>{{ $scheduler->comment }}</p>
@endsection
