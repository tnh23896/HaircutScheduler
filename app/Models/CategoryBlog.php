<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryBlog extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'category_blogs';

    protected $fillable = [
        'title',        
    ];
    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
