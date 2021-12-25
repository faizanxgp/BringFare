<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function bid() {
        return $this->belongsTo('App\Bid');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function ratingby() {
        return $this->belongsTo('App\User', 'rating_by');
    }

}