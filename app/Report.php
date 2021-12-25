<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function bid() {
        return $this->belongsTo('App\Bid');
    }

    public function comment() {
        return $this->belongsTo('App\BidComment');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}