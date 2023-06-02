<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scheduler_user extends Model
{
    protected $table = 'scheduler_user';
    use HasFactory;
    protected $fillable = [
        'type',
        'time_start',
        'time_finish',
        'id_user',
        'scheduler_id',
        'created_at',
        'updated_at'
    ];

    public function users()
    {
        return $this->BelongsTo(users::class, 'id');
    }

    public function schedulers()
    {
        return $this->BelongsTo(schedulers::class, 'id');
    }
}
