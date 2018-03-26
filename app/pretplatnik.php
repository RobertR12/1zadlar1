<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pretplatnik extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
