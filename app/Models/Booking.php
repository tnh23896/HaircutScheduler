<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'bookings';
    protected $fillable = [
        'name', 'user_id', 'admin_id', 'phone', 'promo_id', 'status', 'price', 'email', 'day', 'work_schedule_detail_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
    public function work_schedule_detail()
    {
        return $this->belongsTo(WorkScheduleDetail::class);
    }
    public function booking_details()
    {
        return $this->hasMany(BookingDetail::class, 'booking_id', 'id');
    }
    public function times()
    {
        return $this->belongsToMany(Time::class, 'work_schedule_details', 'work_schedules_id', 'time_id')->withPivot('status');
    }
}
