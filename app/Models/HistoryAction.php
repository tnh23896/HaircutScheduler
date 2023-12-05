<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoryAction extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'history_actions';
    protected $fillable = [
        'admin_id',
        'action',
        'booking_id',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    
    public function booking(){
        return $this->belongsTo(Booking::class);
    }
}
