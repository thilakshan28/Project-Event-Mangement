<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'capacity',
        'address',
        'description'
    ];

    public function orders(){
        return $this->hasMany(Order::class,'venue_id');
    }
}
