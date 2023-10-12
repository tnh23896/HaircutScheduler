<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryService extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'category_services';

    protected $fillable = [
        'name', 'image',
    ];
    public function services()
    {
        return $this->hasMany(Service::class);
    }


}
