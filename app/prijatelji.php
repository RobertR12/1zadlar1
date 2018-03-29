<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prijatelji extends Model
{
    protected $fillable = [
        'User_id', 'Friend_id',
    ];
}
