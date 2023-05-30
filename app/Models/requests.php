<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'reason',
        'type_request',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->BelongsTo(users::class, 'id');
    }
}
