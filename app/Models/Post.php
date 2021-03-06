<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
