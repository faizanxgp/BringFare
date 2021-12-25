<?php

/* not in use */


namespace App;

use Illuminate\Database\Eloquent\Model;

class BidStatus extends Model
{

    public function bid() {
        return $this->belongsTo('App\Bid');
    }

    public function  user() {
        return $this->belongsTo('App\User');
    }
}