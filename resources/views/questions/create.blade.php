@extends('layouts.app')

@section('content')
    <style>
        .questions-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            padding: 0.5rem;
        }

        .question-item {
            padding: 1rem;
            background-color: rgb(235, 235, 235);
            display: flex;
            flex-direction: column;
            width: 100%;
            gap: 1rem;
            padding: 1rem;
        }

        .title_question {
            text-align: center;
            font-weight: 700;
        }

        .question {
            display: flex;
            align-items: center;
            gap: 1rem;

        }

        .input-question {
            border: none
        }

        .input-answer {}
    </style>

    <p>Create question</p>
    <input hidden type="text" name="exam_id" id="exam_id" value="{{ $exam_id }}">
    <input hidden type="text" name="number_of_questions" id="number_of_questions" value="{{ $no_questions }}">

    <div class="questions-container">
        @for ($i = 0; $i < $no_questions; $i++)
            <div class="question-item">

                <div class="form-group">
                    <div class="pull-left">
                        <label for="question" style="margin-right: 2rem;">Question #{{ $i + 1 }}</label>
                    </div>
                    <div class="pull-right">
                        <input type="radio" name="type_answer" id="type_answear_{{ $i }}" value="true"
                            checked>
                        <label for="">Multiple option</label>
                        <input type="radio" name="type_answer" id="type_answear_{{ $i }}" value="false">
                        <label for="">open answer</label>
                    </div>
                </div>

                <input type="text" name="question" id="question_{{ $i }}" placeholder="Q:"
                    class="form-control input-question">

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

                <label for="option_c">Write your answer:</label>
                <textarea name="open_answer" id="open_answer_{{ $i }}" rows="6" class="form-control input-answer"></textarea>
                {{-- <input type="tex-area" name="option_a" id="option_c_{{ $i }}" class="form-control input-answer"> --}}

            </div>
        @endfor
    </div>
@endsection
