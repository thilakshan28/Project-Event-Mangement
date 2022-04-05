<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;
    protected $fillable = [
        'parking_name',
        'nearby',
        'size',
        'description',
        'amount'
    ];

    protected $casts =['nearby' => 'array'];

    public function orders(){
        return $this->hasMany(Order::class,'park_id');
    }
}
