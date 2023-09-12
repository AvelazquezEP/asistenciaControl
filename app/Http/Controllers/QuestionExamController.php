<?php

namespace App\Http\Controllers;

use App\Models\questionsExam;
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

    public function index(): View
    {
        return view('exam.index');
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
        $request->validate([
            // 'number_of_question' => 'required',
            // 'question' => 'required',
            // 'option_a' => 'required',
            // 'option_b' => 'required',
            // 'option_c' => 'required',
            // 'open_answer' => 'required',
            // 'correct_answer' => 'required',
            // 'answer_details' => 'required',
            // 'exam_id' => 'required',
        ]);

        $exam_id = $request->get('exam_id');
        $question_type = $request->get('question_type');

        $questions = new questionsExam([]);

        if ($question_type == 'true') { //<-- multiple option

            $questions = new questionsExam([
                'number_of_question' => 1,
                'question' => $request->get('question'),
                'option_a' => $request->get('option_a'),
                'option_b' => $request->get('option_b'),
                'option_c' => $request->get('option_c'),
                'open_answer' => "-",
                'correct_answer' => $request->get('correct_answer'),
                'answer_details' => "answer detail",
                'exam_id' => $request->get('exam_id'),
            ]);
        } else {

            $questions = new questionsExam([
                'number_of_question' => 1,
                'question' => $request->get('question'),
                'option_a' => "-",
                'option_b' => "-",
                'option_c' => "-",
                'open_answer' => $request->get('open_answer'),
                'correct_answer' => "** without multiple option",
                'answer_details' => "-",
                'exam_id' => $request->get('exam_id'),
            ]);
        }

        $questions->save();

        return redirect()->route('exam.show', $exam_id)
            ->with('success', 'Question created successfully');
    }

    public function edit($id): View
    {
        $question = questionsExam::find($id);
        $question_id = $id;

        return view('questions.edit', compact('question', 'question_id'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $question = questionsExam::find($id);

        $id_exam = $question->exam_id;

        $question->number_of_question = 1;
        $question->question = $request->input('question');
        $question->option_a = $request->input('option_a');
        $question->option_b = $request->input('option_b');
        $question->option_c = $request->input('option_c');
        $question->open_answer = $request->input('open_answer');
        $question->correct_answer = $request->input('correct_answer');
        $question->exam_id = $request->input('exam_id');

        $question->save();

        return redirect()->route('exam.show', $id_exam)
            ->with('success', 'Question updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $question = questionsExam::find($id);

        $question->delete();

        return redirect()->route('exam.show', $question->exam_id);
    }
}
