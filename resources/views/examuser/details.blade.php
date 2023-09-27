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
            justify-content: center;
            align-items: center;
            gap: 1rem;
            background-color: rgb(253, 251, 249);
            border-radius: 0.5rem;
            text-align: center;
            font-size: 1.5rem;
        }

        .answer {
            /* background-color: white; */
            border-radius: 0.2rem;
            padding: 0.8rem;
        }

        .review-button {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: end;
            gap: 0.8rem;
        }
    </style>

    <form action="/examuser/save_open_question" method="POST" class="question-container">
        @csrf
        {{-- <div > --}}
        <input hidden type="text" id="exam_id" value="{{ $exam_id }}">
        <input hidden type="text" id="id_user" value="{{ $id_user }}">

        @foreach ($questions as $question)
            <div class="question" id="question_container_{{ $question->id }}">
                <input hidden type="text" id="question_id" value="{{ $question->id }}">
                <input hidden type="text" id="question_answer_{{ $question->id }}" value="-">
                <input hidden type="text" id="id_question_{{ $question->id }}" value="{{ $question->id_question }}">

                <div class="question-detail">
                    <p><b>{{ $question->question }}</b></p>
                </div>
                <div>
                    <p class="answer"><b></b> {{ $question->answer }}</p>
                </div>
                <div class="review-button">
                    <div>
                        <a class="btn btn-primary true-button" onclick="change_to_correct({{ $question->id }})">Correct</a>
                    </div>
                    <div>
                        <a class="btn btn-danger false-button"
                            onclick="change_to_incorrect({{ $question->id }})">Incorrect</a>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- </div> --}}
        <button type="submit" class="btn btn-primary">Save and send</button>
    </form>

    <script script src="{{ asset('js/review_question.js') }}"></script>
@endsection
