@extends('layouts.app')

@section('content')
    <style>
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1rem;
        }

        .question-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1;
        }

        .question {
            text-align: center;
            font-weight: 700;
            font-size: 1.2rem;
        }
    </style>

    <div class="container">
        @foreach ($user_questions as $key => $question)
            <div class="question-container">
                <div class="question">
                    {{ $question->question }}
                </div>
                <div class="answer">
                    @foreach ($question_saved as $key => $question_saved)
                        @if ($question_saved->id == $user_question->id_question && $question_saved)
                        @else
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
