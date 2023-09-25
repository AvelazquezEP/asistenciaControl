@extends('layouts.app')

@section('content')
    <style>
        .main-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .question-container {
            background-color: rgb(248, 248, 248);
            display: flex;
            flex-direction: column;
            gap: 1rem;
            padding: 1rem;
            border-radius: 0.5rem;
        }

        .question {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .open-anser {}

        .option-multiple {}

        .item-option {
            display: flex;
        }

        .btn-save {
            margin-bottom: 1rem;
            padding: 1rem 2rem;
        }
    </style>
    <div class="exam-header">
        <h2>{{ $exam->exam_name }}</h2>
    </div>
    <form action="/examuser/question" method="POST">
        @csrf
        <?php $control_number = Session::get('control_number'); ?>
        <input hidden type="text" name="control_number" value="{{ $control_number }}">

        @foreach ($questions as $key => $question)
            <div class="main-container">
                <div class="question-container" id="question_container_{{ $question->id }}">
                    <div class="question">
                        <p>{{ $question->question }}</p>
                    </div>

                    <input hidden type="text" name="id_question" value="{{ $question->id }}">
                    <input hidden type="text" name="exam_id" value="{{ $exam->id }}">
                    {{-- <input hidden type="text" name="control_number" value="{{ $control_number }}"> --}}
                    {{-- <input hidden type="text" name="control_number_{{ $question->id }}" value="{{ $control_number }}"> --}}

                    <div class="answer">
                        @if ($question->option_a == '-' || $question->option_b == '-' || $question->option_c == '-')
                            <div class="open-answer">
                                <textarea name="open_element_{{ $question->id }}" id="open_element_{{ $question->id }}" rows="6"
                                    class="form-control input-answer" placeholder="anwser:"></textarea>
                            </div>
                        @else
                            <div class="option-multiple">
                                <input hidden type="text" name="chosen_option_{{ $question->id }}"
                                    id="chosen_option_{{ $question->id }}" value="-">

                                <div class="item-option">
                                    <div>
                                        <input type="radio" name="option_answer_{{ $question->id }}"
                                            id="option_a_{{ $question->id }}" value="option_a"
                                            onclick="change_option({{ $question->id }})">
                                    </div>
                                    <div>
                                        <p>{{ $question->option_a }}</p>
                                    </div>
                                </div>

                                <div class="item-option">
                                    <div>
                                        <input type="radio" name="option_answer_{{ $question->id }}"
                                            id="option_b_{{ $question->id }}" value="option_b"
                                            onclick="change_option({{ $question->id }})">
                                    </div>
                                    <div>
                                        <p>{{ $question->option_b }}</p>
                                    </div>
                                </div>

                                <div class="item-option">
                                    <div>
                                        <input type="radio" name="option_answer_{{ $question->id }}"
                                            id="option_c_{{ $question->id }}" value="option_c"
                                            onclick="change_option({{ $question->id }})">
                                    </div>
                                    <div>
                                        <p>{{ $question->option_c }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div>
                        <a class="btn btn-primary btn-save" onclick="save_question({{ $question->id }})">save</a>
                        {{-- <button type="submit" class="btn btn-primary btn-save">save</button> --}}
                    </div>

                </div>

            </div>
        @endforeach
        <button type="submit" class="btn btn-primary btn-save" onclick="">Finish</button>
    </form>

    <script script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script script src="{{ asset('js/save_question.js') }}"></script>
@endsection
