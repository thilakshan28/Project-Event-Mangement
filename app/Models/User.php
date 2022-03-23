<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'phone'
    ];

 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }

    public  function managedby(){
        return $this->belongsToMany(Event::class,'event_manager')->withTimestamps();
    }

    public  function createdby(){
        return $this->belongsToMany(Event::class,'event_user')->withPivot(['date','time'])->withTimestamps();
    }

    public function facilities(){
        return $this->belongsToMany(Facility::class,'facility_user')->withPivot(['date','start_time','end_time'])->withTimestamps();
    }

    public function food(){
        return $this->belongsToMany(Food::class,'food_user')->withPivot(['date','count'])->withTimestamps();
    }

    public function venues(){
        return $this->belongsToMany(Venue::class,'user_venue')->withPivot(['date','start_time','end_time'])->withTimestamps();
    }

    
}

