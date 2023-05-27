<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resources extends Model
{

    

    use HasFactory;
    protected $fillable = [
        'title',
        'id_category',
        'description',
        'resource_file',
        'path_resource',
        'extension_resource',
        'status',
        'created_at',
        'updated_at',
    ];

    public function resource_category()
    {
        return $this->BelongsTo(resource_categories::class, 'id');
    }
}
