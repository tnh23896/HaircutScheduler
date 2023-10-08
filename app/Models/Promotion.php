<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'promotions';
    protected $fillable = [
        'promocode', 'description', 'discount', 'expire_date',
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
