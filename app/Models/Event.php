<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    
    protected $fillable = [
        'event_type',
        'amount',
        
        
    ];

    public  function managers(){
        return $this->belongsToMany(User::class,'event_manager')->withTimestamps();
        
    }

    public  function customers(){
        return $this->belongsToMany(User::class,'event_user')->withPivot(['date','time'])->withTimestamps();
    }
    


}
