<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'name',
        'duration',
        'amount'
    ];

    public function users(){
        return $this->belongsToMany(User::class,'facility_user')->withPivot(['date','start_time','end_time'])->withTimestamps();
    }
}
