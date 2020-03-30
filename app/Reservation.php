<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function setArrivalDateAttribute($value)
    {
        if (isset($value)){
            $value = str_replace('/', '-', $value);
            $this->attributes['arrival_date'] = date('Y-m-d H:i', strtotime($value));
        }
    }
}
