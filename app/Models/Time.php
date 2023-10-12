<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Time extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'times';
    protected $fillable = [
        'time',
    ];
    public function work_schedule_details()
    {
        return $this->hasMany(WorkScheduleDetail::class);
    }
    public function work_schedules()
    {
        return $this->belongsToMany(WorkSchedule::class, 'work_schedule_details', 'time_id', 'work_schedules_id')->withPivot('status');
    }
}
