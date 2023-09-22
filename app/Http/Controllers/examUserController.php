<?php

namespace App\Http\Controllers;

use App\Models\exam_users;
use App\Http\Controllers\Controller;
use App\Models\exams;
use App\Models\questions_users;
use App\Models\questionsExam;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class examUserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:exams-list|exams-create|exams-edit|exams-delete', ['only', ['index']]);
        $this->middleware('permission:exams-create', ['only' => ['store']]);
        $this->middleware('permission:exams-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:exams-delete', ['only' => ['destroy']]);
    }

    public function index($id): View
    {
        $questions = questionsExam::where('exam_id', $id)->get();
        $exam = exams::find($id);

        return view('examuser.index', compact('questions', 'exam'));
    }

    public function create($id)
    {
        $questions = questionsExam::where('exam_id', $id)->get();
        $exam = exams::find($id);

        return view('examuser.index', compact('questions', 'exam'));
    }

    public function store(Request $request): RedirectResponse
    {
        // $id_temp = 1;

        $request->validate([]);

        $id_exam = $request->get('exam_id');
        $control_number = $request->get('control_number');

        $exam_user = new exam_users([
            'user_name' => $request->get('user_name'),
            'department' => $request->get('department'),
            'control_number' => $request->get('control_number'),
            'correct_answer' => '0',
            'incorrect_answer' => '0',
            'empty_answer' => '0',
            'exam_name' => $request->get('exam_name'),
            'id_exam' => $id_exam,
        ]);

        $exam_user->save();

        return redirect()->route('examuser.show', $id_exam)
            ->with(['id_exam' => $id_exam, 'control_number' => $control_number]);

        // return view('examuser.show', $id_exam, compact(''));
    }

    public function show($id): View
    {
        // $test = 'text test';

        $questions = questionsExam::where('exam_id', $id)->get();
        // $questions = questionsExam::where('exam_id', $id)->take(1)->get();

        $exam = exams::find($id);

        return view('examuser.show', compact('questions', 'exam'));
    }

    public function save_question(Request $request)
    {
        $exam_id = $request->input('exam_id');
        $exam = exams::find($exam_id);

        $questions = questionsExam::where('exam_id', $exam_id)->get();

        $question_tmp = '';

        foreach ($questions as $key => $question) {
            $question_multiple = $request->input('chosen_option_' . $question->id);
            $question_open = $request->input('open_element_' . $question->id);

            if (empty($question_open)) {

                $save_question = new questions_users([
                    'answer' => $question_multiple,
                    'id_question' => $question->id,
                    'exam_name' => 'INTRODUCTION EXAM',
                    'id_exam_user' => $question->exam_id,
                    'correct_answer' => $question->correct_answer,
                ]);

                $save_question->save();
            } else {
                $save_question = new questions_users([
                    'answer' => $question_open,
                    'id_question' => $question->id,
                    'exam_name' => 'INTRODUCTION EXAM',
                    'id_exam_user' => 1,
                    'correct_answer' => $question->correct_answer,
                ]);

                $save_question->save();
            }
        }

        return redirect()->route('examuser.result', 1)
            ->with('success', 'Congratulations, you finished the exam');
    }

    public function details($id): View
    {
        // $correct_id = $id;
        $correct_count = '5';
        $incorrect_count = '8';

        return view('examuser.details', compact('correct_count', 'incorrect_count'));
    }

    public function results($id)
    {

        $correct_count = '5';
        $incorrect_count = '8';

        $array_correct = array();
        $array_incorrect = array();
        $array_blank = array();

        $exam_question = questionsExam::where('exam_id', $id)->get();
        $question_user = questions_users::where('id_question', $exam_question->id)->get();

        foreach ($question_user as $key => $question) {

            $correct_answer_question = $question->correct_answer;

            if ($question->answer == $correct_answer_question) {
                // $array_correct . push($question_answer);
                array_push($array_correct, $question);
            }
        }

        return view('examuser.result', compact('correct_count', 'incorrect_count'));
    }

    public function edit(exam_users $exam_users)
    {
        //
    }

    public function update(Request $request, exam_users $exam_users)
    {
        //
    }

    public function destroy(exam_users $exam_users)
    {
        //
    }
}
