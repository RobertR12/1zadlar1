<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lokacija extends Model
{

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    protected $primaryKey = "Id";
}
