<?php

namespace App\Http\Controllers;

use App\Models\questionExam;
use App\Models\exams;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuestionExamController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:exams-list|exams-create|exams-edit|exams-delete', ['only', ['index']]);
        $this->middleware('permission:exams-create', ['only' => ['store']]);
        $this->middleware('permission:exams-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:exams-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        // 
    }

    public function create($id): View
    {
        $exam_id = $id;
        // $exam_data = exams::where('id', $id)->get();
        $exam_data = exams::find($id);
        $no_questions = $exam_data->number_of_questions;

        return view('questions.create', compact('exam_id', 'no_questions'));
    }

    public function store(Request $request): RedirectResponse
    {
        return redirect()->route('questionExam.index')
            ->with('success', 'Exam created successfully');
    }

    // public function show(questionExam $questionExam)
    // {
    //     //
    // }

    // public function edit(questionExam $questionExam)
    // {
    //     //
    // }

    // public function update(Request $request, questionExam $questionExam)
    // {
    //     //
    // }

    // public function destroy(questionExam $questionExam)
    // {
    //     //
    // }
}
