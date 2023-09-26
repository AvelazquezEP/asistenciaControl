<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questions_users extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'id_question',
        'exam_name',
        'id_exam_user',
        'correct_answer',
        'control_number',
    ];
}
