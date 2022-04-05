<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
            'event_id',
            'manager_id',
            'startdate',
            'enddate',
            'starttime',
            'endtime',
            'status',
            'park_id',
            'facility_id',
            'venue_id'
    ];

    public function event(){
        return $this->belongsTo(Event::class,'event_id');
    }

    public function customer(){
        return $this->belongsTo(User::class,'customer_id');
    }

    public function manager(){
        return $this->belongsTo(User::class,'manager_id');
    }

    public function park(){
        return $this->belongsTo(Parking::class,'park_id');
    }

    public function facility(){
        return $this->belongsTo(Facility::class,'facility_id');
    }

    public function venue(){
        return $this->belongsTo(Venue::class,'venue_id');
    }

    public function meals(){
        return $this->belongsToMany(Meal::class,'meal_order')->withPivot('date','when')->withTimestamps();
    }

    public function travels(){
        return $this->belongsTo(Travel::class,'travel_id');
    }
}
