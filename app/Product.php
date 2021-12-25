<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function bids() {
        return $this->hasMany('App\Bid');
    }

    public function hasBids($user_id) {
        // $user_id is bidder id
        $bids = $this->bids()->where('user_id', $user_id)->count();
        return $bids;
    }

    public function invitation() {
        return $this->hasMany('App\Invitation');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}