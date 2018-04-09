<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prijatelji extends Model
{
    protected $fillable = [
        'User_id', 'Friend_id',
    ];

    public function user1()
    {
        return $this->belongsToMany('App\User' );
    }

    public function user()
    {
        return $this->hasOne('App\User', 'Id', 'User_id' );
    }
    public function user2()
    {
        return $this->hasOne('App\User', 'Id', 'Friend_id' );
    }

    protected $primaryKey = "Id";
}
