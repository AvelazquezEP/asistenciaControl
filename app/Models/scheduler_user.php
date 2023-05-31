<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class scheduler_user extends Model
{
    use HasFactory;
    protected $table = 'scheduler_user';

    public function users()
    {
        return $this->BelongsTo(users::class, 'id');
    }

    public function schedulers()
    {
        return $this->BelongsTo(schedulers::class, 'id');
    }
}
