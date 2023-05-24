<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'picture',
        'description',
        'status',
        'created_at',
        'updated_at',
    ];
}
