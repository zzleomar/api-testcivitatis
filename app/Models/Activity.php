<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{ 
    protected $fillable = [
        'id', 'title', 'description', 'startAvailableDate', 'endAvailableDate', 'price', 'popularity'
    ];

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    use HasFactory;
    public $timestamps = false;
}