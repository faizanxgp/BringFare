<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function followby() {
        return $this->belongsTo('App\User', 'follow_by');
    }

}