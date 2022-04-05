<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'event_type',
        'amount',
        'description'
    ];

    public function orders(){
        return $this->hasMany(Order::class,'event_id');
    }
}
