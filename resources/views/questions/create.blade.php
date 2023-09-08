@extends('layouts.app')

@section('content')
    <style>
        .questions-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            /* justify-content: space-between; */
        }

        .question-item {
            padding: 1rem;
            background-color: antiquewhite;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 600px;
        }
    </style>

    <p>Create question</p>
    <input hidden type="text" name="exam_id" id="exam_id" value="{{ $exam_id }}">
    <input hidden type="text" name="number_of_questions" id="number_of_questions" value="{{ $no_questions }}">

    <div class="questions-container">
        @for ($i = 0; $i < $no_questions; $i++)
            <div class="question-item">
                <p>Question #{{ $i + 1 }}</p>
                <div class="question">
                    <label for="option_a">a)</label>
                    <input type="text" name="option_a" id="option_a" class="form-control">
                </div>

                <div class="question">
                    <label for="option_b">b)</label>
                    <input type="text" name="option_a" id="option_a" class="form-control">
                </div>

                <div class="question">
                    <label for="option_c">c)</label>
                    <input type="text" name="option_a" id="option_a" class="form-control">
                </div>
            </div>
        @endfor
    </div>
@endsection
