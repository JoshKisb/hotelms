<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 
        'lastname', 
        'email', 
        'password', 
        'phone', 
        'address', 
        'dob', 
        'gender', 
        'city',
        'salary',
        'salary_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function setDobAttribute($value)
    {
        if (isset($value)){
            $value = str_replace('/', '-', $value);
            $this->attributes['dob'] = date('Y-m-d', strtotime($value));
        }
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

    public function avatarUrl()
    {
        if (isset($this->avatar))
            return asset($this->avatar);
        else
            return asset('/images/img.jpg');
    }

    public function getNameAttribute()
    {
        return title_case($this->attributes['firstname']." ".$this->attributes['lastname']);
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function hasAccess(array $permissions) 
    {
        if($this->role->hasAccess($permissions)) {
            return true;
        }
        return false;
    }

}
