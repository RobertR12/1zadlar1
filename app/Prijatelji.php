<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prijatelji extends Model
{
    protected $fillable = [
        'User_id', 'Friend_id',
    ];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    protected $primaryKey = "Id";
}
