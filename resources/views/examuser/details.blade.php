@extends('layouts.app')

@section('content')
    <style>
        .question-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            justify-content: center;
            align-items: center;
        }

        .question {
            width: 80%;
            height: 200px;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            /* background-color: antiquewhite; */
            border-radius: 0.3rem;
            text-align: center;
            font-size: 1.5rem;
        }

        .answer {
            background-color: white;
            border-radius: 0.2rem;
            padding: 0.8rem;
        }

        .review-button {
            display: flex;
            flex-direction: row;
            justify-content: end;
        }
    </style>

    <div class="question-container">
        <div class="question">
            @foreach ($questions as $key => $question)
                <input type="text" id="id_question_{{ $question->id }}" value="-">
                <div class="question-detail">
                    <p><b>{{ $question->question }}</b></p>
                </div>
                <div>
                    <p class="answer"><b></b> {{ $question->answer }}</p>
                </div>
                <div class="review-button">
                    <div>
                        <a class="btn btn-primary true-button" onclick="change_to_correct($question->id)">Correct</a>
                        <a class="btn btn-danger false-button" onclick="change_to_incorrect($question->id)">Incorrect</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script script src="{{ asset('js/review_question.js') }}"></script>
@endsection
