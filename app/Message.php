<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // not in use
    public function user() {
        return $this->belongsTo('App\User');
    }

}