<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'reviews';   
    protected $fillable = [
        'star', 'content', 'user_id', 'admin_id', 'service_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
