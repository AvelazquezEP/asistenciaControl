<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedulers extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'comment',
        'start_time',
        'finish_time',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->BelongsTo(users::class, 'id');
    }
}
