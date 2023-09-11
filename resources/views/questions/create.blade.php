@extends('layouts.app')

@section('content')
    <style>
        .main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
            padding: 0.5rem;
        }

        .question-item {
            padding: 1rem;
            background-color: rgb(235, 235, 235);
            display: flex;
            flex-direction: column;
            width: 100%;
            gap: 2rem;
            padding: 1rem;
        }

        .header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .multiple-questions-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .question {
            display: flex;
            align-items: center;
            gap: 1rem;

        }

        .open_answer_container {}

        .input-question {
            border: none
        }

        .input-answer {}

        .btn-save {
            /* float: right; */
            margin-left: 80%;
            width: 20%;
        }
    </style>

    <p>Create question</p>
    <input hidden type="text" name="exam_id" id="exam_id" value="{{ $exam_id }}">
    <input hidden type="text" name="number_of_questions" id="number_of_questions" value="{{ $no_questions }}">

    <div class="main-container">
        @for ($i = 0; $i < $no_questions; $i++)
            <div class="question-item">

                <div class="header">
                    <div class="left-side">
                        <label for="question" style="margin-right: 2rem;">Question #{{ $i + 1 }}</label>
                    </div>
                    <div class="right-side">
                        <input onclick="change_answer_type('type_answer_yes_{{ $i }}')" type="radio"
                            name="type_answer_{{ $i }}" id="type_answer_yes_{{ $i }}" value="true"
                            checked>
                        <label for="">Multiple option</label>
                        <input onclick="change_answer_type('type_answer_no_{{ $i }}')" type="radio"
                            name="type_answer_{{ $i }}" id="type_answer_no_{{ $i }}" value="false">
                        <label for="">open answer</label>
                    </div>
                </div>

                <div class="title-question">
                    <input type="text" name="question" id="question_{{ $i }}" placeholder="Q:"
                        class="form-control input-question">
                </div>

                <div class="multiple-questions-container_{{ $i }}" id="multiple-questions-container">
                    <div class="question">
                        <label for="option_a">a)</label>
                        <input type="text" name="option_a" id="option_a_{{ $i }}"
                            class="form-control input-answer">
                    </div>

                    <div class="question">
                        <label for="option_b">b)</label>
                        <input type="text" name="option_a" id="option_b_{{ $i }}"
                            class="form-control input-answer">
                    </div>

                    <div class="question">
                        <label for="option_c">c)</label>
                        <input type="text" name="option_a" id="option_c_{{ $i }}"
                            class="form-control input-answer">
                    </div>
                </div>

                <div class="open_answer_container_{{ $i }}" id="open_answer_container">
                    <label for="option_c">Write your answer:</label>
                    <textarea name="open_answer" id="open_answer_{{ $i }}" rows="6" class="form-control input-answer"></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-save">Save question</button>
            </div>
        @endfor
    </div>

    <script src="{{ asset('js/questions.js') }}"></script>
@endsection
