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

    protected $primaryKey = "Id";
}
