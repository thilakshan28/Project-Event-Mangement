<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'amount'
    ];

    public function users(){
       return $this->belongsToMany(User::class,'food_user')->withPivot(['date'])->withTimestamps();
    }
}
