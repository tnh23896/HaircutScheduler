<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkScheduleDetail extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'work_schedule_details';
    protected $fillable = [
        'time_id', 'work_schedules_id', 'status',
    ];
}
