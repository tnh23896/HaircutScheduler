<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkSchedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'work_schedules';
    protected $fillable = [
        'admin_id',
        'day',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function work_schedule_details()
    {
        return $this->hasMany(WorkScheduleDetail::class);
    }

    public function times()
    {
        return $this->belongsToMany(Time::class, 'work_schedule_details', 'work_schedules_id',
            'time_id')->withPivot('status');
    }
}
