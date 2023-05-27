<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resource_categories extends Model
{
    use HasFactory;

    public function resources()
    {
        return $this->hasMany(resources::class);
    }
}
