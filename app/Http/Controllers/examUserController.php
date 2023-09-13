<?php

namespace App\Http\Controllers;

use App\Models\exam_users;
use App\Http\Controllers\Controller;
use App\Models\exams;
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

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $questions = questionsExam::where('exam_id', $id)->get();
        $exam = exams::find($id);

        return view('examuser.index', compact('questions', 'exam'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $id_temp = 1;

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

        return redirect()->route('examuser.show', $id_temp)
            ->with('success', 'Exam finished successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $test = 'text test';

        return view('examuser.show', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(exam_users $exam_users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, exam_users $exam_users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(exam_users $exam_users)
    {
        //
    }
}
