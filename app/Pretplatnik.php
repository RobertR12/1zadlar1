<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pretplatnik extends Model
{
    protected $fillable = [
        'user_id',
    ];

    public function User()
    {
        return $this->belongsToMany('App\User');
    }

    public function user1()
    {
        return $this->hasOne('App\User', 'Id', 'user_id');
    }

    protected $primaryKey = "Id";
}
