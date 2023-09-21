@extends('layoutes.app')

@section('content')
    <style>
        .result-count {
            font-weight: 500;
        }
    </style>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{ $message }}</strong>.
        </div>
    @endif

    <h2>Results</h2>
    <div class="container">
        <p>Name: Test</p>

        <p>Multiple questions:</p>
        <p>Correct: <span class="result-count">1</span></p>
        <p>Incorrect: <span class="result-count">1</span></p>
    </div>
@endsection
