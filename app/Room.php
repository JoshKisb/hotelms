<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    public function room_type()
    {
        return $this->belongsTo('App\RoomType');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function($room){ 
            $room->room_type->room_count++;
            $room->room_type->save();
                
        });
        static::deleted(function($room){ 
            $room->room_type->room_count--;
            $room->room_type->save();
        });
    }
}
