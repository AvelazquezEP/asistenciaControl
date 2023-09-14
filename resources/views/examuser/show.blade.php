@extends('layouts.app')

@section('content')
    <style>
        .main-container {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
            padding: 1rem;
        }

        .question-container {
            background-color: rgb(241, 241, 241);
            display: flex;
            flex-direction: column;
            gap: 1rem;
            padding: 1rem;
        }
    </style>
    <div class="exam-header">
        <h2>{{ $exam->exam_name }}</h2>
    </div>
    @foreach ($questions as $key => $question)
        <div class="main-container">
            <div class="question-container">
                <div class="question">
                    <p>{{ $question->question }}</p>
                </div>

                <div class="answer">
                    @if ($question)
                        <div class="option-multiple">
                            <p>{{ $question->option_a }}</p>
                            <p>{{ $question->option_b }}</p>
                            <p>{{ $question->option_c }}</p>
                        </div>
                    @else
                        <div class="open-answer">
                            <textarea name="" id="" cols="30" rows="10"></textarea>
                        </div>
                    @endif
                </div>

                <div>
                    <button>send</button>
                </div>
            </div>
        </div>
    @endforeach
@endsection
