<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingDetail extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'booking_details';
    protected $fillable = [
        'service_id',
        'name',
        'price',
        'booking_id',
        'status',
        'admin_id',
    ];
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
