<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resources_exams extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'department',
        'description',
        'status',
        'created_at',
        // 'updated_at',
    ];
}
