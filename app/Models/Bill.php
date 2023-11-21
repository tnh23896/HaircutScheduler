<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'user_id', 'admin_id', 'phone', 'promo_id', 'total_price', 'email', 'day', 'time', 'payment'
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
    public function bill_details()
    {
        return $this->hasMany(BillDetail::class, 'bill_id', 'id');
    }
}
