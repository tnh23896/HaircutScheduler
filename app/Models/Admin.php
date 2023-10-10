<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory,Notifiable,SoftDeletes;
    
    protected $table = 'admins';
    protected $guarded = 'admin';
    protected $fillable = [
        'username', 'avatar', 'phone', 'email', 'password', 'description','remember_token',
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function work_schedules()
    {
        return $this->hasMany(WorkSchedule::class);
    }
}
