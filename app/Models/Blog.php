<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'blogs';
  
    protected $fillable = [
        'title', 'description', 'image', 'category_blog_id'
    ];
    public function category_blog(){
        return $this->belongsTo(CategoryBlog::class);
    }
}
