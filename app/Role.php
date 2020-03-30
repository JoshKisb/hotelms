<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $casts = [
        'permissions' => 'array',
    ];

    protected $fillable = [
        'name', 'description', 'permissions' 
    ];

    public static $permissions = [
        'view_roles',
        'manage_roles',
        'view_users',
        'manage_users',
        'view_roomtypes',
        'manage_roomtypes',
        'view_rooms',
        'manage_rooms',
        'view_customers',
        'manage_customers',
        'view_reservations',
        'manage_reservations',
        'view_occupants',
        'manage_occupants',
        'view_invoices',
        'manage_settings',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function addPermission($permission, $value = true)
    {
        if (!isset($this->permissions)) $this->permissions = array();

        if (! array_key_exists($permission, $this->permissions)) {
            $this->permissions = array_merge($this->permissions, [$permission => $value]);
        }

        return $this;
    }

    public function removePermission($permission)
    {
        if (!isset($this->permissions)) $this->permissions = array();
        
        if (array_key_exists($permission, $this->permissions)) {
            $permissions = $this->permissions;

            unset($permissions[$permission]);

            $this->permissions = $permissions;
        }

        return $this;
    }

    public function hasAccess(array $permissions) 
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission))
                return true;
        }
        return false;
    }

    public function hasPermission($permission) 
    {
    	if (isset($this->permissions[$permission]))
    		return $this->permissions[$permission];
        else return false;
    }
}
