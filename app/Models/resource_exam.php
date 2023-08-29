<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resource_exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'type:',
        'department',
        'description',
        'status',
    ];
}
