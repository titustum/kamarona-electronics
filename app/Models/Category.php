<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'added_by', 'image_path'];

    // Relationship with User (who added the category)
    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}

 
