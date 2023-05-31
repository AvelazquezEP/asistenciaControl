<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function scheduler_user(): HasMany
    {
        return $this->hasMany(scheduler_user::class);
    }

    // public function users()
    // {
    //     return $this->BelongsTo(users::class, 'id');
    // }
}
