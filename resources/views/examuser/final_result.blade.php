@extends('layouts.app')

@section('content')
    <style>
        .answer-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2rem;
        }

        .correct-container,
        .incorrect-container,
        .blank-container {
            width: 400px;
            height: 100px;
            padding: 1rem;
            border-radius: 0.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .correct-container {

            /* background-color: rgb(144, 221, 125); */
        }

        .incorrect-container {
            /* background-color: rgb(221, 128, 125); */
        }

        .blank-container {
            /* background-color: rgb(219, 219, 219); */
        }

        .title-answer {
            text-align: center;
            font-size: 1.5rem;
        }

        .total-answer {
            font-weight: 700;
            text-align: center;
        }

        .question-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .btn-send {
            padding: 1rem 4rem;
            /* font-size: 2rem; */
            font-weight: bold;
        }
    </style>
    {{-- <p>CORRECT: {{ $total_correct }}</p> <!-- INTEGER -->
    <p>INCORRECT: {{ $total_incorrect }}</p>
    <p>{{ $last_correct_answer }}</p> <!-- STRING -->
    <p>{{ $last_incorrect_answer }}</p>
    <br> --}}
    {{-- <p>FINAL COUNT: {{ $final_correct_answer }}</p>
    <p>FINAL COUNT: {{ $final_incorrect_answer }}</p> --}}


    <div class="answer-container">
        <div class="correct-container">
            <div>
                <p class="title-answer">Correct answers:</p>
                <p class="total-answer">{{ $final_correct_answer }}</p>
                {{-- <p class="total-answer">{{ $correct_answer_onffor }}</p> --}}
            </div>
        </div>

        <div class="incorrect-container">
            <div>
                <p class="title-answer">Incorrect answers:</p>
                <p class="total-answer">{{ $final_incorrect_answer }}</p>
                {{-- <p class="total-answer">{{ $incorrect_answer_onffor }}</p> --}}
            </div>
        </div>

        {{-- <div class="blank-container">
            <div>
                <p class="title-answer">Open answers:</p>
                <p class="total-answer">{{ $open_answer_count }}</p>
            </div>
        </div>

        <div class="blank-container">
            <div>
                <p class="title-answer">Blank answers:</p>
                <p class="total-answer">{{ $blank_answer_count }}</p>
            </div>
        </div> --}}
    </div>
    {{-- <div>
        <button type="submit" class="btn btn-primary btn-send">Finish</button>
    </div> --}}
@endsection
