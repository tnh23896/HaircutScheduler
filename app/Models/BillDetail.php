<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'name',
        'price',
        'bill_id',
        'admin_id',
    ];
    public function bill()
    {
        return $this->belongsTo(Bill::class);
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
