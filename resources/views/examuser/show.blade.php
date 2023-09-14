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

        .btn-save {}
    </style>
    <div class="exam-header">
        <h2>{{ $exam->exam_name }}</h2>
    </div>
    @foreach ($questions as $key => $question)
        <div class="main-container">
            <div class="question-container">
                <div class="question">
                    <p>{{ $question->question }}</p>
                </div>

                <div class="answer">
                    @csrf

                    @if ($question->option_a == '-' || $question->option_b == '-' || $question->option_c == '-')
                        <div class="open-answer">
                            <textarea name="" id="open_element_{{ $question->id }}" rows="6" class="form-control input-answer"
                                placeholder="anwser:"></textarea>
                        </div>
                    @else
                        <div class="option-multiple">
                            <input hidden type="text" id="chosen_option_{{ $question->id }}" value="a">

                            <div class="item-option">
                                <div>
                                    <input type="radio" name="option_answer" id="option_a"
                                        value="{{ $question->option_a }}">
                                </div>
                                <div>
                                    <p>{{ $question->option_a }}</p>
                                </div>
                            </div>

                            <div class="item-option">
                                <div>
                                    <input type="radio" name="option_answer" id="option_b"
                                        value="{{ $question->option_b }}">
                                </div>
                                <div>
                                    <p>{{ $question->option_b }}</p>
                                </div>
                            </div>

                            <div class="item-option">
                                <div>
                                    <input type="radio" name="option_answer" id="option_c"
                                        value="{{ $question->option_c }}">
                                </div>
                                <div>
                                    <p>{{ $question->option_c }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div>
                    <button class="btn btn-primary btn-save"
                        onclick="save_question('chosen_option_{{ $question->id }}', 'open_element_{{ $question->id }}')">send</button>
                </div>
            </div>
        </div>
    @endforeach

    <script src="{{ asset('js/save_question.js') }}"></script>
@endsection
