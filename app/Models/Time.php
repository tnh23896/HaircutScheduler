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
}