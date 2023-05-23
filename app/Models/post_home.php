<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_home extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'picture',
        'description'
    ];
}
