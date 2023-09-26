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
    </style>

    <div class="container">
        <h2>Results</h2>
        <?php $control_number = Session::get('control_number'); ?>

        <div class="answer-container">
            <div class="correct-container">
                <div>
                    <p class="title-answer">Correct answers:</p>
                    <p class="total-answer">{{ $correct_answer_count }}</p>
                    {{-- <p class="total-answer">{{ $correct_answer_onffor }}</p> --}}
                </div>
            </div>

            <div class="incorrect-container">
                <div>
                    <p class="title-answer">Incorrect answers:</p>
                    <p class="total-answer">{{ $incorrect_answer_count }}</p>
                    {{-- <p class="total-answer">{{ $incorrect_answer_onffor }}</p> --}}
                </div>
            </div>

            <div class="blank-container">
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
            </div>
        </div>
    </div>
@endsection
