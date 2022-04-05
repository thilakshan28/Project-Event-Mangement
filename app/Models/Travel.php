<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_type',
        'vehicle_number',
        'peoples',
        'amount'
    ];

    public function orders(){
        return $this->belongsToMany(Order::class,'travel_id');
    }
}
