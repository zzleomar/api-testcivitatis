<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \App\Models\Activity;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'numberPeople', 'price', 'dateReservation', 'dateCompletionActivity', 'activityId'
    ];
    protected $hidden = ['created_at','updated_at'];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activityId');
    }
}
