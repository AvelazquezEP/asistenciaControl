@extends('layouts.app')

@section('content')
    @foreach ($data as $item)
        <table>
            <strong>{{ $item->type }}</strong>
            <p>Time start: {{ $item->time_start }}</p>
            <p>Time finish: {{ $item->time_finish }}</p>
        </table>
    @endforeach
@endsection
