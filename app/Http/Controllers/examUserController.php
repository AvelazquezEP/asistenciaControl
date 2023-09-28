<?php

namespace App\Http\Controllers;

use App\Models\exam_users;
use App\Http\Controllers\Controller;
use App\Models\exams;
use App\Models\questions_users;
use App\Models\questionsExam;
use App\Models\requests;
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
    /* #region CREATE/STORE */

    public function create($id)
    {
        /* #region create */
        $questions = questionsExam::where('exam_id', $id)->get();
        $exam = exams::find($id);

        return view('examuser.index', compact('questions', 'exam'));
        /* #endregion */
    }

    public function store(Request $request): RedirectResponse
    {
        /* #region STORE/START THE EXAM */
        $request->validate([]);

        $id_exam = $request->get('exam_id');
        $control_number = $request->input('control_number');
        $find_control_number = exam_users::where('control_number', $control_number)->take(1)->get();

        // if ($control_number == $find_control_number[0]->control_number) {
        if (count($find_control_number) > 0) {
            return redirect()->route('examuser.show', $id_exam)
                ->with(['id_exam' => $id_exam, 'control_number' => $control_number]);
        } else {
            $exam_user = new exam_users([
                'user_name' => $request->get('user_name'),
                'department' => $request->get('department'),
                'control_number' => $control_number,
                'correct_answer' => '0',
                'incorrect_answer' => '0',
                'empty_answer' => '0',
                'exam_name' => $request->get('exam_name'),
                'id_exam' => $id_exam,
            ]);
            $exam_user->save();
            return redirect()->route('examuser.show', $id_exam)
                ->with(['id_exam' => $id_exam, 'control_number' => $control_number]);
        }
        /* #endregion */
    }

    /* #endregion */

    public function show($id): View
    {
        /* #region PENDIENTE DE UTILIZAR*/
        $questions = questionsExam::where('exam_id', $id)->get();
        $exam = exams::find($id);

        return view('examuser.show', compact('questions', 'exam'));
        /* #endregion */
    }

    public function save_question(Request $request)
    {
        /* #region SAVE QUESTIONS*/
        $exam_id = $request->input('exam_id');
        $exam = exams::find($exam_id);

        $questions = questionsExam::where('exam_id', $exam_id)->get();

        foreach ($questions as $key => $question) {
            $control_number = $request->input('control_number');
            $question_multiple = $request->input('chosen_option_' . $question->id);
            $question_open = $request->input('open_element_' . $question->id);
            $exam_name_test = 'INTRODUCTION EXAM';

            if (empty($question_open)) {

                $save_question = new questions_users([
                    'question' => $question->question,
                    'answer' => $question_multiple,
                    'id_question' => strval($question->id),
                    'exam_id' => $exam_id,
                    'exam_name' => $exam_name_test,
                    'id_exam_user' => $question->exam_id,
                    'correct_answer' => $question->correct_answer,
                    'control_number' => $control_number,
                ]);

                $save_question->save();
            } else {
                if (empty($question_open)) {
                    $save_question = new questions_users([
                        'question' => $question->question,
                        'answer' => "-",
                        'id_question' => strval($question->id),
                        'exam_id' => $exam_id,
                        'exam_name' => $exam_name_test,
                        'id_exam_user' => $question->exam_id,
                        'correct_answer' => "-",
                        'control_number' => $control_number,
                    ]);
                    $save_question->save();
                } else {
                    $save_question = new questions_users([
                        'question' => $question->question,
                        'answer' => $question_open,
                        'id_question' => strval($question->id),
                        'exam_id' => $exam_id,
                        'exam_name' => $exam_name_test,
                        'id_exam_user' => $question->exam_id,
                        'correct_answer' => "-",
                        'control_number' => $control_number,
                    ]);
                    $save_question->save();
                }
            }
        }

        return redirect()->route('examuser.results', $exam_id)
            ->with('success', 'Congratulations, you finished the exam', ['control_number' => $control_number]);
        /* #endregion */
    }

    public function results($id)
    {
        /* #region RESULTS */
        $correct_answer_count = 0;
        $incorrect_answer_count = 0;
        $blank_answer = 0;

        $array_correct = array();
        $array_incorrect = array();
        $array_blank = array();
        $array_open_questions = array();

        $exam_questions = questionsExam::where('exam_id', $id)->get();

        foreach ($exam_questions as $key => $exam_question) {
            $question_id = $exam_question->id;
            $question_user = questions_users::where('id_question', $question_id)->get();

            if ($question_user[0]->correct_answer == "-") {
                array_push($array_open_questions, $question_id);
            } else {
                if ($question_user[0]->answer == $exam_question->correct_answer) {
                    array_push($array_correct, $question_id);
                } else {
                    array_push($array_incorrect, $question_id);
                }
            }
        }

        $correct_answer_count = count($array_correct);
        $incorrect_answer_count = count($array_incorrect);
        $open_answer_count = count($array_open_questions);
        $blank_answer_count = count($array_blank);

        return view('examuser.result', compact(
            'correct_answer_count',
            'incorrect_answer_count',
            'open_answer_count',
            'blank_answer_count',
        ));
        /* #endregion */
    }

    public function exam_users()
    {
        $user_exams = exam_users::get()->all();

        return view('examuser.exam_users', compact('user_exams'));
    }

    public function details($id): View
    {
        $user_exam = exam_users::find($id);
        $id_user = $user_exam->id;

        $control_number = $user_exam->control_number;
        $exam_id = $user_exam->id_exam;

        $questions = questions_users::where([
            'control_number' => $control_number,
            'correct_answer' => '-',
        ])->get();

        return view('examuser.details', compact('control_number', 'questions', 'exam_id', 'id_user'));
    }

    public function save_open_question(Requests $request)
    {
        // $id_user = $request->get('exam_id');
        $id_user = $request->get('id_user');

        // ('examuser.final_result', compact('id_user'));
        return redirect()->route('examuser.final_result', 1)
            ->with(['id_user' => $id_user]);

        // return redirect()->route('examuser.final_result', $id_user)
        //     ->with(['id_user' => $id_user]);

        /* #region SAVE_OPEN_QUESTION*/
        // $array_open_correct = array();
        // $array_open_incorrect = array();
        // $request->get('exam_id');
        // get('id_user');

        /* #region TMP */
        // $user_id = $request->get('id_user');
        // // $exam_user_id = $request->get('exam_id');

        // $questions = questions_users::where('id_exam_user', 1)->get();

        // foreach ($questions as $question) {
        //     $actual_question_id = $question->id;
        //     $input_question = $request->get('question_id ');

        //     if ($actual_question_id == $input_question) {
        //         $question_answer = 'question_answer_' . $input_question;

        //         // $question_user = questions_users::find($input_question);
        //         // $question_user->correct_answer = $question_answer;

        //         array_push($array_open_correct, $question->id);
        //     }
        // }

        // $total = count($array_open_correct);
        /* #endregion */


        // return view('examuser.final_result', 1, compact('test'));
        // return redirect()->route('examuser.final_result', $id_user)
        //     ->with(['id_user' => $id_user]);
        /* #endregion */
    }

    public function final_result($id)
    {
        /* #region RESULTS */
        $test_final = 's';

        return view('examuser.final_result', compact('test_final'));
        /* #endregion */
    }
}
