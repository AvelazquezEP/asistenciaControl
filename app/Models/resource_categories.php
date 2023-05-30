<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class resource_categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'Description',
        'icon',
        'status',
        'created_at',
        'updated_at',
    ];

    public function resources(): HasMany
    {
        return $this->hasMany(resources::class);
    }
}
