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

        $exam_user = new exam_users([
            'user_name' => $request->get('user_name'),
            'department' => $request->get('department'),
            'correct_answer' => '0',
            'incorrect_answer' => '0',
            'empty_answer' => '0',
            'exam_name' => $request->get('exam_name'),
            'id_exam' => $id_exam,
        ]);

        $exam_user->save();

        return redirect()->route('examuser.show', $id_exam)
            ->with('success', 'Exam finished successfully');
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

        $exam_id = $request->get('exam_id');

        $exam = exams::find($exam_id);
        $total_questions = $exam->number_of_questions;
        // $question_id = 1;

        // $question = $request->get('chosen_option_1');
        // $question = $request->input('chosen_option_2');

        // $question_user = new questions_users([
        //     // 'answer' => "option_a",
        //     'answer' => $question,
        //     'id_question' => $exam_id,
        //     'exam_name' => 'INTRODUCTION EXAM',
        //     'id_exam_user' => 1,
        // ]);
        // $question_user->save();

        for ($i = 0; $i < $total_questions; $i++) {
            $question = $request->get('chosen_option_' . $i);
            $open_question = $request->get('open_element_' . $i);

            if ($question != "-") {
                $question_user = new questions_users([
                    // 'answer' => $question,
                    'answer' => $question,
                    'id_question' => $exam_id,
                    'exam_name' => 'INTRODUCTION EXAM',
                    'id_exam_user' => 1,
                ]);
                $question_user->save();
            } else {
                $question_user = new questions_users([
                    // 'answer' => $open_question,
                    'answer' => $open_question,
                    'id_question' => $exam_id,
                    'exam_name' => 'INTRODUCTION EXAM',
                    'id_exam_user' => 1,
                ]);
                $question_user->save();
            }
        }

        return redirect()->route('exam.index', 1)
            ->with('success', 'Questions saved');
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
