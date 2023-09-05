<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exams extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_of_questions',
        'exam_name',
        'description',
        'id_resource_exam',
    ];
}
