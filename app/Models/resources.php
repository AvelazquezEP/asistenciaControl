<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resources extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'resource_file',
        'path_resource',
        'extension_resource',
        'status',
        'created_at',
        'updated_at',
    ];
}
