<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id', 'status', 'about', 'phone', 'email_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function verified()
    {
        $this->verified = 1;
        $this->status = 1;
        $this->email_token = null;
        $this->save();
    }

    public function product() {
        return $this->hasMany('App\Product');
    }

    public function trip() {
        return $this->hasMany('App\Trip');
    }

    public function notifications() {
        return $this->hasMany('App\Notification');
    }

    public function getNotification() {

        //\DB::enableQueryLog();
        $notification = $this->notifications()->where('is_new', '1')->orderBy('id', 'desc')->limit(10)->get();
        //dump(\DB::getQueryLog());

        return $notification;
    }

    public function hasNotification() {

        //\DB::enableQueryLog();
        $notification = $this->notifications()->where('is_new', '1')->count();
        //dump(\DB::getQueryLog());
        return $notification;
    }

//    public function message() {
//        return $this->hasMany('App\Message');
//    }
//
//    public function hasMessage() {
//
//        //\DB::enableQueryLog();
//        $message = $this->message()->where('is_new', '1')->count();
//        //dump(\DB::getQueryLog());
//        return $message;
//    }

    public function message() {
        return $this->hasMany('App\BidComment');
    }

    public function hasMessage() {

        //\DB::enableQueryLog();
        $message = $this->message()->where('is_new', '1')->count();
        //dump(\DB::getQueryLog());
        return $message;
    }

    public function following() {
        return $this->hasMany('App\Following', 'user_id');
    }

    public function hasFollowing($f_id) {
        // $f_id = following by
        // $this->id = current user whose object it is
        $following = $this->following()->where('follow_by', $f_id)->count();
        return $following;
    }

    public function followBy() {
        return $this->hasMany('App\Following', 'follow_by');
    }


    public function reviews() {
        return $this->hasMany('App\Rating');
    }

    public function reviews_buyer() {
        $reviews = $this->reviews()->where('rating_as', 'Buyer')->count();
        return $reviews;
    }

    public function reviews_seller() {
        $reviews = $this->reviews()->where('rating_as', 'Seller')->count();
        return $reviews;
    }

    public function rating_buyer() {
        $reviews = $this->reviews()->where('rating_as', 'Buyer')->pluck('rating');
        $rating =  $reviews->sum();
        $count = $reviews->count();
        if ($count > 0) {
            $rating = number_format($rating / $count, 2, '.', ',');
        } else {
            $rating = 0;
        }
        return $rating;
    }

    public function rating_seller() {
        $reviews = $this->reviews()->where('rating_as', 'Seller')->pluck('rating');
        $rating =  $reviews->sum();
        $count = $reviews->count();
        if ($count > 0) {
            $rating = number_format($rating / $count, 2, '.', ',');
        } else {
            $rating = 0;
        }
        return $rating;
    }

    public function ledger() {
        return $this->hasMany('App\Ledger');
    }

    public function ledger_balance() {
        $ledger = $this->ledger()->pluck('amount');
        $balance =  $ledger->sum();
////        $count = $reviews->count();
////        if ($count > 0) {
////            $rating = number_format($rating / $count, 2, '.', ',');
////        } else {
////            $rating = 0;
////        }
       return $balance;
    }
}
