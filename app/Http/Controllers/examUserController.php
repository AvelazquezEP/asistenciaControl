<?php

namespace App\Http\Controllers;

use App\Models\exam_users;
use App\Http\Controllers\Controller;
use App\Models\exams;
use App\Models\questions_users;
use App\Models\questionsExam;
use App\Models\requests;
use Illuminate\Contracts\Session\Session;
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
                // 'department' => $request->get('department'),
                'department' => 'Call Center',
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
                    'id_exam_user' => $question->exam_id, //<-- posiblemente no se necesita
                    'correct_answer' => $question->correct_answer,
                    'control_number' => $control_number,
                    'answer_result' => '-',
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
                        'answer_result' => '-'
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
                        'answer_result' => '-'
                    ]);
                    $save_question->save();
                }
            }
        }

        return redirect()->route('examuser.results', $exam_id)
            ->with(['exam_id' => $exam_id, 'control_number' => $control_number]);
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
                    $question_user[0]->answer_result = "true";
                    $question_user[0]->save();
                    array_push($array_correct, $question_id);
                } else {
                    $question_user[0]->answer_result = "false";
                    $question_user[0]->save();
                    array_push($array_incorrect, $question_id);
                }
            }
        }

        $correct_answer_count = count($array_correct);
        $incorrect_answer_count = count($array_incorrect);
        $open_answer_count = count($array_open_questions);
        $blank_answer_count = count($array_blank);

        // $exam_user_save = exam_users::where()->get();

        return view('examuser.result', compact(
            'correct_answer_count',
            'incorrect_answer_count',
            'open_answer_count',
            'blank_answer_count',
        ));
        /* #endregion */
    }

    public function save_result(Request $request)
    {
        /* #region SAVE RESULTS */
        $request->validate([]);

        $control_number = $request->get('user_control_number');
        $exam_id = $request->get('exam_id');

        $total_correct_answer = $request->get('correct_answer_count');
        $total_incorrect_answer = $request->get('incorrect_answer_count');
        $total_blank_answer = $request->get('blank_answer_count');

        $user_exam = exam_users::where('control_number', $control_number)->get();

        $user_exam[0]->correct_answer = $total_correct_answer;
        $user_exam[0]->incorrect_answer = $total_incorrect_answer;
        $user_exam[0]->empty_answer = $total_blank_answer;

        $user_exam[0]->save();

        return redirect()->route('examuser.exam_users', $exam_id)
            ->with('success', 'Finished exam: ' . $control_number);

        // return redirect()->route('examuser.index', $exam_id)
        //     ->with('success', 'Finished exam: ' . $control_number);
        /* #endregion */
    }

    // This functions its like a index method
    public function exam_users()
    {
        $user_exams = exam_users::get()->all();

        return view('examuser.exam_users', compact('user_exams'));
    }

    public function details($id): View
    {
        /* #region DETAILS */
        $user_exam = exam_users::find($id);
        $id_user = $user_exam->id;

        $control_number = $user_exam->control_number;
        $exam_id = $user_exam->id_exam;

        $questions = questions_users::where([
            'control_number' => $control_number,
            'correct_answer' => '-',
        ])->get();

        return view('examuser.details', compact('control_number', 'questions', 'exam_id', 'id_user'));

        /* #endregion */
    }

    public function save_open_question(Request $request)
    {
        /* #REGION SAVE OPEN QUESTION */
        $array_questions = array();
        $array_questions_id = array();
        $array_correct = array();
        $array_incorrect = array();

        $request->validate([]);

        $control_number = $request->get('control_number');
        $id_user = $request->get('exam_user_id');
        $exam_id = $request->get('exam_id');

        $questions = questions_users::where('control_number', $control_number)->get();

        foreach ($questions as $question) {

            $question_id = $question->id;
            if ($question->correct_answer == "-") {
                array_push($array_questions, $question_id);

                $input_answer = $request->get('question_answer_' . $question_id);
                if ($input_answer == 'true') {
                    $question->answer_result = 'true';
                    $question->save();
                    array_push($array_correct, $question_id);
                } else {
                    $question->answer_result = 'false';
                    $question->save();
                    array_push($array_incorrect, $question_id);
                }
            }
        }

        $total_correct = count($array_correct);
        $total_incorrect = count($array_incorrect);
        /* #endregion */

        /* #region calculate total answer */
        $last_result = exam_users::where('control_number', $control_number)->get();

        $last_correct_answer = (int)$last_result[0]->correct_answer;
        $last_incorrect_answer = (int)$last_result[0]->incorrect_answer;

        $final_correct_answer = $total_correct + $last_correct_answer;
        $final_incorrect_answer = $total_incorrect + $last_incorrect_answer;

        $exam_user = exam_users::where('control_number', $control_number)->get();

        $exam_user[0]->correct_answer = $final_correct_answer;
        $exam_user[0]->incorrect_answer = $final_incorrect_answer;

        $exam_user[0]->save();

        return view('examuser.final_result', compact(
            'final_correct_answer',
            'final_incorrect_answer',
        ));

        /* #endregion */
    }

    public function final_result(Request $request, $id)
    {
        /* #region RESULTS */
        // $id_user = $request->session()->get('id_user', 'default');
        // $test_final = 's';


        $test = 'test';
        // return view('examuser.final_result', compact('test'));
        /* #endregion */
    }

    public function review_exam($id)
    {

        $exam_user = exam_users::where('id', $id)->get();

        // USER DATA
        $user_name = $exam_user[0]->user_name;
        $control_number = $exam_user[0]->control_number;
        $exam_id = $exam_user[0]->id_exam;

        $questions_saved = questionsExam::where('exam_id', $exam_id)->orderBy('id', 'ASC')->get();
        $user_questions = questions_users::where('control_number', $control_number)->orderBy('id', 'ASC')->get();

        return view('examuser.review_exam', compact('questions_saved', 'user_questions', 'control_number', 'user_name'));
    }
}
