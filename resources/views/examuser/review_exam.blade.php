@extends('layouts.app')

@section('content')
    <style>
        .header_section {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: start;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1rem;
        }

        .question-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1;
            background-color: rgb(250, 248, 247);
            width: 100%;
            padding: 1rem 0;
            border-radius: 0.5rem;
        }

        .question {
            text-align: center;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .correct_answer {
            background-color: rgb(181, 226, 163);
        }
    </style>

    <div class="container">
        {{-- user_questions --> QUESTIONS USERS --}}
        {{-- questions_saved --> EXAM QUESTIONS --}}
        <div class="header_section">
            <div>
                <p><b>Name:</b> {{ $user_name }}</p>
            </div>
            <div>
                <p><b>Control Number:</b> {{ $control_number }}</p>
            </div>
        </div>
        @foreach ($user_questions as $key => $question)
            <div class="question-container">
                <div class="question">
                    {{ $question->question }}
                </div>
                <div class="answer">
                    @if ($question->correct_answer != '-')
                        @foreach ($questions_saved as $key => $question_saved)
                            @if ($question_saved->id == $question->id_question)
                                @if ($question_saved->correct_answer == 'option_a')
                                    @if ($question_saved->correct_answer == 'option_a')
                                    @else
                                    @endif
                                    <p class="correct_answer">a) {{ $question_saved->option_a }}</p>
                                    <p>b) {{ $question_saved->option_b }}</p>
                                    <p>c) {{ $question_saved->option_c }}</p>
                                @elseif ($question_saved->correct_answer == 'option_b')
                                    <p>a) {{ $question_saved->option_a }}</p>
                                    <p class="correct_answer">b) {{ $question_saved->option_b }}</p>
                                    <p>c) {{ $question_saved->option_c }}</p>
                                @elseif ($question_saved->correct_answer == 'option_c')
                                    <p>a) {{ $question_saved->option_a }}</p>
                                    <p>b) {{ $question_saved->option_b }}</p>
                                    <p class="correct_answer">c) {{ $question_saved->option_c }}</p>
                                @endif
                            @else
                                {{--  --}}
                            @endif
                        @endforeach
                    @else
                        <p><b>Answer:</b> {{ $question->answer }}</p>
                    @endif()
                </div>
            </div>
        @endforeach
    </div>
@endsection
