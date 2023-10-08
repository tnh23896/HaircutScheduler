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
}
