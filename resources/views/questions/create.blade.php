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
            display: none;
        }

        .question {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 0.8rem;
        }

        .form-question {
            display: flex;
            flex-direction: column;
            gap: 3rem;
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
    <input hidden type="text" name="number_of_questions" id="number_of_questions" value="{{ $no_questions }}">

    <div class="main-container">
        {{-- @for ($i = 0; $i < $no_questions; $i++) --}}
        <div class="question-item">

            <div class="header">
                <div class="left-side">
                    <label for="question" style="margin-right: 2rem;">Question #</label>
                </div>
                <div class="right-side">
                    <label for="">Multiple option:</label>
                    <input onclick="change_answer_type('type_answer_yes')" type="radio" name="type_answer"
                        id="type_answer_yes" value="true">
                    <label for="">yes</label>
                    <input onclick="change_answer_type('type_answer_no')" type="radio" name="type_answer"
                        id="type_answer_no" value="false" checked>
                    <label for="">no</label>
                </div>
            </div>

            <form action="{{ route('questionExam.store') }}" class="form-question" method="POST">
                @csrf
                <input hidden type="text" name="exam_id" id="exam_id" value="{{ $exam_id }}">
                <input hidden type="text" name="question_type" id="question_type" value="false">
                <div class="title-question">
                    {{-- <input type="text" name="question" id="question" placeholder="Q:"
                        class="form-control input-question"> --}}
                    <textarea name="question" id="question" rows="2" class="form-control input-answer" placeholder="Q:"></textarea>
                </div>

                <div class="multiple-questions-container" id="multiple-questions-container">
                    <div class="question">
                        <label for="option_a">a)</label>
                        <input type="text" name="option_a" id="option_a" class="form-control input-answer">
                        <span id="option_a_input" style="color: red;"></span>
                    </div>

                    <div class="question">
                        <label for="option_b">b)</label>
                        <input type="text" name="option_b" id="option_b" class="form-control input-answer">
                        <span id="option_b_input" style="color: red;"></span>
                    </div>

                    <div class="question">
                        <label for="option_c">c)</label>
                        <input type="text" name="option_c" id="option_c" class="form-control input-answer">
                        <span id="option_c_input" style="color: red;"></span>
                    </div>
                    <div class="question">
                        <label for="option_c">correct answer:</label>
                        <select name="correct_answer" id="correct_answer" class="form-control">
                            <option value="option_a">a</option>
                            <option value="option_b">b</option>
                            <option value="option_c">c</option>
                        </select>
                        {{-- <input type="text" name="correct_answer" id="correct_answers" class="form-control input-answer"> --}}
                    </div>
                </div>

                <div class="open_answer_container" id="open_answer_container">
                    <label for="option_c">description (optional):</label>
                    <textarea name="open_answer" id="open_answer" rows="6" class="form-control input-answer">-</textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-save">Save question</button>
                {{-- <button id="ButtonSend" class="btn btn-primary btn-save">Save question</button> --}}
            </form>
        </div>
        {{-- @endfor --}}
    </div>

    <script src="{{ asset('js/questions.js') }}"></script>
@endsection
