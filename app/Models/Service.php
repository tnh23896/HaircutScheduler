<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'services';

    protected $fillable = [
        'name', 'price', 'image', 'description', 'category_services_id', 'percentage_discount'
    ];
    public function booking_details()
    {
        return $this->hasMany(BookingDetail::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function category_services()
    {
        return $this->belongsTo(CategoryService::class);
    }
}
