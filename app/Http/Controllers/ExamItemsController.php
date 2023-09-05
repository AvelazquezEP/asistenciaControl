<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\exams;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ExamItemsController extends Controller
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
        $exam = exams::where('id_resource_exam', $id)->get();

        return view('exam.index', compact('exam'));
    }

    public function create(): View
    {
        // $exam = exams
        return view('exam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'number_of_questions' => 'required',
            'exam_name' => 'required',
            'description' => 'required',
            'id_resource_exam' => 'required',
        ]);

        $id_resource_exam = $request->get('id_resource_exam');

        $exam = new exams([
            'number_of_questions' => $request->get('number_of_questions'),
            'exam_name' => $request->get('exam_name'),
            'description' => $request->get('description'),
            'id_resource_exam' => $id_resource_exam,
        ]);

        return redirect()->route('exam.index', $id_resource_exam)
            ->width('success', 'Exam created successfully');
    }

    public function show($id): View
    {
        $exam = exams::find($id);

        return view('exam.show', compact('exam'));
    }

    public function edit($id): View
    {
        $exam = exams::find($id);

        return view('exam.edit', compact('exam'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'number_of_questions' => 'required',
            'exam_name' => 'required',
            'description' => 'required',
            'id_resource_exam' => 'required',
        ]);

        $exam = exams::find($id);

        $id_exam = $exam->id_resource_exam;

        $exam->number_of_questions = $request->input('number_of_questions');
        $exam->exam_name = $request->input('exam_name');
        $exam->description = $request->input('description');
        $exam->id_resource_exam = $id_exam;

        $exam->save();

        return redirect()->route('exam.index', $id_exam)
            ->with('success', 'Exam updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $exam = exams::find($id);
        $exam->delete();

        return redirect()->route('exams.index', $id);
    }
}
