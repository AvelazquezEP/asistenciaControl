<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questionsExam extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_of_question',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'open_answer',
        'correct_answer',
        'answer_details',
        'exam_id',
    ];
}
