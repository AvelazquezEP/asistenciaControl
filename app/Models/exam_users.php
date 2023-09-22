<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam_users extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'department',
        'control_number',
        'correct_answer',
        'incorrect_answer',
        'empty_answer',
        'exam_name',
        'id_exam',
    ];
}
