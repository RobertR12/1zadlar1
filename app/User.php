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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function prijatelj() {

        return $this ->hasMany('App\prijatelj');
    }

    public function lokacija() {

        return $this ->hasOne('App\lokacija');
    }

    public function pretplatnik() {

        return $this ->hasMany('App\pretplatnik');
    }

}
