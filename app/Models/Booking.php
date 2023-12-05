<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bookings';
    protected $fillable = [
        'name',
        'user_id',
        'admin_id',
        'phone',
        'promo_id',
        'status',
        'total_price',
        'amount_paid',
        'email',
        'day',
        'time',
        'payment'
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
        return $this->belongsTo(Promotion::class, 'promo_id', 'id');
    }

    public function booking_details()
    {
        return $this->hasMany(BookingDetail::class, 'booking_id', 'id');
    }
    
    public function history_actions(){
        return $this->hasMany(HistoryAction::class, 'booking_id', 'id');
    }
}
