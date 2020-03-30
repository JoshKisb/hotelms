<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
     protected $fillable = [
        'firstname', 
        'lastname', 
        'email', 
        'phone', 
        'address', 
        'dob', 
        'gender', 
        'city',
    ];

    public function setDobAttribute($value)
    {
        if (isset($value)){
            $value = str_replace('/', '-', $value);
            $this->attributes['dob'] = date('Y-m-d', strtotime($value));
        }
    }
}
