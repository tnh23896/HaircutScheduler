<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkScheduleDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'work_schedule_details';
    protected $fillable = [
        'time_id', 'work_schedules_id', 'status',
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function time()
    {
        return $this->belongsTo(Time::class);
    }
    public function work_schedules()
    {
        return $this->belongsTo(WorkSchedule::class);
    }
}
