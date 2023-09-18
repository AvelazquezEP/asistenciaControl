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
        $exam = exams::find($id);

        return view('examuser.show', compact('questions', 'exam'));
    }

    public function save_question(Request $request)
    {
        // 'answer',
        // 'id_question',
        // 'exam_name',
        // 'id_exam_user',

        // $id_exam = 1;

        $exam_id = $request->get('exam_id');
        $exam_questions = questionsExam::where('exam_id', $exam_id)->get();
        // $exam_user = questions_users::find($id_exam);

        // $user_questions = questions_users::where('id_exam_user', $exam_user->id);


        $request->validate([]);

        $question_id = $request->get('id_question');
        // chosen_option_{{ $question->id }}
        $option = $request->get('chosen_option_' . $question_id);

        return redirect()->route('exam.index', 1)
            ->with('success', 'saved' . $exam_questions[0]->exam_id);
        // ->with('success', 'saved' . $exam_user->id . $option);

        // if ($id_ajax != 3) {
        //     return redirect()->route('exam.index', 1)
        //         ->with('success', 'saved' . $question_id . $option);
        // } else {
        //     return view('examuser.index', 1);
        // }
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
