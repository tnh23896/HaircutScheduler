<?php

namespace App\Models;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'reviews';
    protected $fillable = [
        'star', 'comment', 'user_id', 'admin_id', 'booking_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
		public function booking() {
			return $this->belongsTo(Booking::class);
		}
}
