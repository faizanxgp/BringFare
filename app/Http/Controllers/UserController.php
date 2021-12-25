<?php

namespace App\Http\Controllers;


use App\Invitation;
use Illuminate\Http\Request;

use App\User;
use App\Product;
use App\Category;
use App\Trip;
use App\Bid;
use App\BidComment;
use App\ProductStatus;
use App\Rating;
use App\Notification;
use App\Following;
use App\TripPlace;

use App\Ledger;
use App\AdminMessage;
use App\Report;
use App\Page;

use Mockery\CountValidator\Exception;
use Session;
use Auth;
use Validator;
use Redirect;

use Image; // for resize

use Omnipay\Omnipay;

// User Profile and settings
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('getProfile', 'getPage');
    }

    public function getHome()
    {

        $user = Auth::user();
        $user_id = $user->id;

        $products = Product::where('user_id', $user_id)->where('active', 1)->orderBy('id', 'desc')->limit(5)->get();
        $trips = Trip::where('user_id', $user_id)->orderBy('id', 'desc')->limit(5)->get();


        $bids = Bid::whereHas('product', function ($query) use ($user_id) {
            $query->where('products.user_id', $user_id);
        })->orderBy('product_id', 'desc')->limit(5)->get();

        $applied = Bid::where('user_id', $user_id)->orderBy('product_id', 'desc')->limit(5)->get();


        return redirect()->route('requests');
        //return view('user.dashboard', ['products' => $products, 'trips' => $trips, 'bids' => $bids, 'applied' => $applied]);
    }


    public function getRequests()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $countries = config('variables.countries');
        $categories = Category::all()->pluck('category', 'id');

        $products = Product::where('user_id', $user_id)->where('active', 1)->orderBy('id', 'desc')->get();

        return view('user.requests', ['products' => $products, 'categories' => $categories, 'countries' => $countries]);
    }

    public function getRequest()
    {

        $countries = config('variables.countries');
        $package_sizes = config('variables.package_sizes');
        $delivery_methods = config('variables.delivery_methods');
        $categories = Category::all()->pluck('category', 'id');

        $product = new Product();
        $product->id = 0;
        $product->request_type = 1;
        $product->perishable = 0;
        $product->fragile = 0;

        return view('user.request', ['product' => $product, 'categories' => $categories, 'countries' => $countries, 'package_sizes' => $package_sizes, 'delivery_methods' => $delivery_methods]);
    }

    public function getRequestDuplicate($id)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $countries = config('variables.countries');
        $package_sizes = config('variables.package_sizes');
        $delivery_methods = config('variables.delivery_methods');
        $categories = Category::all()->pluck('category', 'id');

        echo $id;
        $product = Product::findOrFail($id);
        $product->id = 0; // to make a new copy
        $product->user_id = $user_id;

        return view('user.request', ['product' => $product, 'categories' => $categories, 'countries' => $countries, 'package_sizes' => $package_sizes, 'delivery_methods' => $delivery_methods]);
    }

    public function postRequest(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $id = $request['id'];
        $photo_old = $request['photo_old'];
        // photo not required for edit, assuming already there
        if ($id == 0 and $photo_old == "") {
            $rules = array('name' => 'required', 'qty' => 'required|numeric', 'description' => 'required', 'category' => 'required', 'photo' => 'required', 'country' => 'required', 'dcity' => 'required', 'dcountry' => 'required', 'price' => 'required|numeric',);
        } else {
            $rules = array('name' => 'required', 'qty' => 'required|numeric', 'description' => 'required', 'category' => 'required', 'country' => 'required', 'dcity' => 'required', 'dcountry' => 'required', 'price' => 'required|numeric',);
        }

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make($request->all(), $rules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            //$messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator


            if ($id == 0) {
                return Redirect::route('create-request')->withErrors($validator)->withInput();
            } else {
                return Redirect::route('edit-request', $id)->withErrors($validator)->withInput();
            }

        } else {

            if ($id == 0) {
                $product = new Product();
            } else {
                $product = Product::findOrFail($id);
            }

            $product->item_name = $request["name"];
            $product->qty = $request["qty"];
            $product->item_description = $request["description"];
            $product->category_id = $request["category"];
            $product->url = $request["url"];
            $product->country = $request["country"];
            $product->dcity = $request["dcity"];
            $product->dcountry = $request["dcountry"];
            $product->price = $request["price"];
            $product->perishable = $request["perishable"];
            $product->fragile = $request["fragile"];
            $product->package_size = $request["package_size"];
            //$product->delivery_method = $request["delivery_method"];
            $product->require_date = $request["require_date"];
            $product->status = 'Open'; //$request["type"];

            $product->user_id = $user_id; //$user_id;

            $product->save();

            // getting all of the post images
            $file = $request['photo'];
            $destinationPath = 'uploads/products';
            if ($file) {
                // only jpg files of less than 2MB
                $filename = $file->getClientOriginalName();
                // 5mb
                if ($file->getClientMimeType() == "image/jpeg" and $file->getClientSize() < 5242880) {

                    $fname = $user_id . "-" . $filename;
                    // save image name
                    $product->image = $fname;
                    $product->save();

                    //resize
                    $img = Image::make($file->getRealPath());
                    $img->resize(700, 1000, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($destinationPath . '/' . $fname);
                    // end of resize
                }
            } else {
                // for duplicate
                if ($id == 0 and isset($request['photo_old'])) {
                    $product->image = $request['photo_old'];
                    $product->save();
                }
            }

            Session::flash('flash_message', 'Product Request successfully posted! <a href="">Update</a>');

        }

        return redirect()->route('request', $product->id);

    }

    public function getRequestEdit($id)
    {

        $countries = config('variables.countries');
        $package_sizes = config('variables.package_sizes');
        $delivery_methods = config('variables.delivery_methods');
        $categories = Category::all()->pluck('category', 'id');

        $product = Product::findOrFail($id);

        return view('user.request', ['product' => $product, 'categories' => $categories, 'countries' => $countries, 'package_sizes' => $package_sizes, 'delivery_methods' => $delivery_methods]);

    }

    public function getRequestInvite($id)
    {
        $product = Product::findOrFail($id);
        $country = $product->country;
        $posted_by = $product->user_id; // only user's own requests

        $trips = Trip::where('country', $country)->get(); // add date check

        // people who follow me
        $following1 = Following::where('user_id', $posted_by)->get();

        $followers_ids = Following::where('user_id', $posted_by)->pluck('follow_by');

        $followers = User::whereIn('id', $followers_ids)->pluck('name', 'id');

        // people I follow
        $following2 = Following::where('follow_by', $posted_by)->get();

        return view('user.invite', ['product' => $product, 'trips' => $trips, 'following2' => $following1, 'followers' => $followers]);

    }

    public function postRequestInvite(Request $request)
    {

        $product_id = $request['product_id'];

        // people visiting country
        $check1 = (isset($request['check1']) ? 1 : 0);
        //$check2 = (isset($request['check2']) ? 1 : 0);
        // all followers
        $check3 = (isset($request['check3']) ? 1 : 0);
        // emails
        $check4 = (isset($request['check4']) ? 1 : 0);
        $emails = $request['emails'];
        $check5 = (isset($request['check5']) ? 1 : 0);
        $followers = (isset($request['followers']) ? $request['followers'] : array());

        // TODO

        $product = Product::findOrFail($product_id);
        $country = $product->country;
        $posted_by = $product->user_id; // only user's own requests
        // trips
        if ($check1) {
            $trips = Trip::where('country', $country)->get(); // add date check

            foreach ($trips as $trip) {
                $user_id = $trip->user_id;
                // check for duplicate
                $invite_count = Invitation::where('product_id', $product_id)->where('user_id', $user_id)->count();
                if ($invite_count == 0) {
                    $invitation = new Invitation();
                    $invitation->product_id = $product_id;
                    $invitation->user_id = $user_id;
                    $invitation->comments = 'Invited';
                    $invitation->save();

                    $notification = new Notification();
                    $notification->description = '<a href="' . route('request', $product_id) . '">You are invited to place bid on Request</a>';
                    $notification->user_id = $user_id;
                    $notification->save();

                }
            }
        }

//        if ($check2) {
//            $following1 = Following::where('user_id', $posted_by)->get();
//
//            foreach ($following1 as $f1) {
//                $user_id = $f1->user_id;
//                // check for duplicate
//                $invite_count = Invitation::where('product_id', $product_id)->where('user_id', $user_id)->count();
//                if ($invite_count == 0) {
//                    $invitation = new Invitation();
//                    $invitation->product_id = $product_id;
//                    $invitation->user_id = $user_id;
//                    $invitation->comments = 'Invited';
//                    $invitation->save();
//
//                    $notification = new Notification();
//                    $notification->description = 'You are invited to place bid on  # .';
//                    $notification->user_id = $user_id;
//                    $notification->save();
//
//                }
//            }
//        }

        if ($check3) {
            $following2 = Following::where('follow_by', $posted_by)->get();

            foreach ($following2 as $f2) {
                $user_id = $f2->user_id;
                // check for duplicate
                $invite_count = Invitation::where('product_id', $product_id)->where('user_id', $user_id)->count();
                if ($invite_count == 0) {
                    $invitation = new Invitation();
                    $invitation->product_id = $product_id;
                    $invitation->user_id = $user_id;
                    $invitation->comments = 'Invited';
                    $invitation->save();

                    $notification = new Notification();
                    $notification->description = '<a href="' . route('request', $product_id) . '>You are invited to place bid on Project</a>';
                    $notification->user_id = $user_id;
                    $notification->save();

                }
            }
        }

        if ($check4) {
            // for emails

        }


        return redirect()->route('request', $product_id);

    }


    public function getRequestSelect($id)
    {

        // user selected for project
        // only if buyer have enough funds in wallet
        // escrow funds on selection so no need of awarded and then added funds

        // logged in user
        $user = Auth::user();
        $user_id = $user->id;
        $balance = $user->ledger_balance();

        $bid_id = $id;

        $bid = Bid::findOrFail($id);
        $bid_amount = $bid->amount;
        $product_id = $bid->product_id;

        if ($balance >= $bid_amount) {

            $product = Product::findOrFail($product_id);

            $product->status = 'Pending Purchase';
            $product->save();

            $bid->status = 'Selected';
            $bid->save();

            $ledger = new Ledger();
            $ledger->auth_code = 0;
            $ledger->trans_id = 0;
            $ledger->amount = $bid_amount * -1;
            $ledger->narration = "Amount transferred to Escrow";
            $ledger->user_id = $user_id;
            $ledger->product_id = $product_id;
            $ledger->save();

            $ledger = new Ledger();
            $ledger->auth_code = 0;
            $ledger->trans_id = 0;
            $ledger->amount = $bid_amount;
            $ledger->narration = "Amount Escrow for Project";
            $ledger->user_id = 0;
            $ledger->product_id = $product_id;
            $ledger->save();

            // awarded

            $product_status = new ProductStatus();
            $product_status->product_id = $product->id;
            $product_status->status = 'Awarded';
            $product_status->status_date = date('Y-m-d H:i:s');
            $product_status->comments = '';
            $product_status->save();

            // funded
            $product_status = new ProductStatus();
            $product_status->product_id = $product->id;
            $product_status->status = 'Pending Purchase';
            $product_status->status_date = date('Y-m-d H:i:s');
            $product_status->comments = '';
            $product_status->save();

            $notification = new Notification();
            $notification->description = '<a href="' . route('request', $bid->product_id) . '">Project awarded to you.</a>';
            $notification->user_id = $bid->user_id;
            $notification->save();


            Session::flash('flash_message', 'Product awarded and money escrowed.');
            return redirect()->route('request', $product_id);
        } else {

            // return with message
            Session::flash('flash_message', 'Error Completing Request.');
            return redirect()->route('request', $product_id);
        }

    }

    public function getTrip()
    {
        $countries = config('variables.countries');

        $trip = new Trip();
        $trip->trip_type = 'Return';
        $trip->id = 0;

        $trips = array();

        for ($a = 0; $a < 4; $a++) {
            $trips[] = [
                "city" => "",
                "country" => "",
                "from_date" => "",
                "upto_date" => ""];
        }

        return view('user.trip', ['trip' => $trip, 'countries' => $countries, 'transit' => $trips]);
    }

    public function postTrip(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $rules = array('country' => 'required', 'fromdate' => 'required', 'country_to' => 'required', 'uptodate' => 'required', 'trip_type' => 'required');

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make($request->all(), $rules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            //$messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return Redirect::route('create-trip')->withErrors($validator)->withInput();

        } else {

            $id = $request["id"];

            if ($id == 0) {
                $trip = new Trip();
            } else {
                $trip = Trip::findOrFail($id);
            }

            $trip->country = $request["country"];
            $trip->from_date = $request["fromdate"];
            $trip->country_to = $request["country_to"];
            if ($request["trip_type"] == "One Way")
                $trip->upto_date = $request["fromdate"];
            else
                $trip->upto_date = $request["uptodate"];

            $trip->trip_type = $request["trip_type"];
            $trip->budget = $request["budget"];
            $trip->notes = $request["notes"];

            $trip->user_id = $user_id; //$user_id;

            $trip->save();

            $trip_id = $trip->id;

            for ($a = 0; $a < 4; $a++) {
                $city = $request->city_transit[$a];
                $country = (isset($request->country_transit[$a]) ? $request->country_transit[$a] : null);
                $from_date = $request->fromDate[$a];
                $upto_date = $request->uptoDate[$a];
                if (
                    ($city != "" or $city != null) and
                    ($country != "" or $country != null) and
                    ($from_date != "" or $from_date != null) and
                    ($upto_date != "" or $upto_date != null)
                ) {

                    $tp = new TripPlace();
                    $tp->trip_id = $trip_id;
                    $tp->city = $city;
                    $tp->country = $country;
                    $tp->from_date = $from_date;
                    $tp->upto_date = $upto_date;
                    $tp->save();
                }


            }


            Session::flash('flash_message', 'Trip successfully updated!');


        }

        return redirect()->route('trips');
    }

    public function getTrips()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $countries = config('variables.countries');

        $trips = Trip::where('user_id', $user_id)->orderBy('id', 'DESC')->get();

        return view('user.trips', ['trips' => $trips, 'countries' => $countries]);
    }

    public function getTripEdit($id)
    {
        $countries = config('variables.countries');

        $trip = Trip::findOrFail($id);

        $trips = TripPlace::where('trip_id', $id)->get()->toArray();
        $ct = count($trips);
        for ($a = $ct; $a < 4; $a++) {
            $trips[] = [
                "city" => "",
                "country" => "",
                "from_date" => "",
                "upto_date" => ""];
        }

        return view('user.trip-edit', ['trip' => $trip, 'countries' => $countries, 'transit' => $trips]);
    }

    public function postAddComment(Request $request)
    {

        // for add and edit comments by bidder

        $user = Auth::user();
        $user_id = $user->id;
        $product_id = $request['id'];

        $rules = array('bid_amount' => 'required|numeric', 'bid_description' => 'required');

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make($request->all(), $rules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            //$messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return Redirect::route('request', $product_id)->withErrors($validator)->withInput();

        } else {

            $product = Product::findOrFail($product_id);

            $bidcount = Bid::where('user_id', $user_id)->where('product_id', $product_id)->count();

            if ($bidcount == 0) {

                if ($user_id != $product->user_id) {
                    $bid = new Bid();

                    $bid->product_id = $product_id;
                    $bid->user_id = $user_id;
                    $bid->amount = $request["bid_amount"];
                    $bid->comments = $request["bid_description"];
                    $bid->status = "Applied";

                    //TODO image

                    // getting all of the post images
                    $file = $request['attachement'];

                    $destinationPath = 'uploads/comments';
                    if ($file) {
                        // only jpg files of less than 2MB
                        $filename = $file->getClientOriginalName();
                        // 5mb
                        if ($file->getClientMimeType() == "image/jpeg" and $file->getClientSize() < 5242880) {

                            $fname = $user_id . "-" . $filename;
                            // save image name
                            $bid->attachement = $fname;

                            //resize
                            $img = Image::make($file->getRealPath());
                            $img->resize(700, 1000, function ($constraint) {
                                $constraint->aspectRatio();
                                $constraint->upsize();
                            })->save($destinationPath . '/' . $fname);
                            // end of resize
                        }
                    }

                    $bid->save();

                    $notification = new Notification();
                    $notification->description = '<a href="' . route('request', $product_id) . '">You received a new Bid.</a>';
                    $notification->user_id = $product->user_id;
                    $notification->save();

                    Session::flash('flash_message', 'Bid successfully updated!');
                } else {
                    Session::flash('flash_message', 'You can not bid on your own request!');
                }
            } else {
                Session::flash('flash_message', 'You already placed a bid before for this product!');
            }

        }
        return redirect()->route('request', $product_id);

    }

    public function getInbox()
    {
        $user = Auth::user();

        $user_id = $user->id;

        //$notifications = Notification::where('user_id', $user_id)->orderBy('id', 'desc')->limit(20)->get();

//        \DB::enableQueryLog();

        // old
        //$bid_comments = BidComment::where('user_id', $user_id)->orderBy('id', 'desc')->limit(10)->get();


        $rel_comments =
            BidComment::select(\DB::raw('MAX(id) as id'))
                ->where('user_id', $user_id)
                ->groupBy('bid_id')
                ->orderBy('id', 'DESC')
                ->get()
                ->toArray();

        $ids = array();
        foreach ($rel_comments as $rel_c) {
            $ids[] = $rel_c['id'];
        };

        $bid_comments = BidComment::whereIn('id', $ids)->orderBy('created_at', 'DESC')->get();
//
//        dump($bid_comments);


        //

//        $bids = Bid::whereExists(function ($query) use($user_id) {
//
//                $query->select("products.user_id")
//
//                      ->from('products')
//
//                      ->whereRaw('products.id = bids.product_id and products.user_id = ' . $user_id);
//
//            })->get();


        return view('user.inbox', ['comments' => $bid_comments]);
    }

    public function getNotification()
    {
        $user = Auth::user();

        $user_id = $user->id;

        $notifications = Notification::where('user_id', $user_id)->update(['is_new' => 0]);

        $notifications = Notification::where('user_id', $user_id)->orderBy('id', 'desc')->paginate(10);

        //$bid_comments = BidComment::where('user_id', $user_id)->orderBy('id', 'desc')->limit(10)->get();

        return view('user.notification', ['notifications' => $notifications]);
    }

    public function getBids()
    {
        $user = Auth::user();

        $user_id = $user->id;


//        \DB::enableQueryLog();

//        $bids = Bid::whereExists(function ($query) use($user_id) {
//
//                $query->select("products.user_id")
//
//                      ->from('products')
//
//                      ->whereRaw('products.id = bids.product_id and products.user_id = ' . $user_id);
//
//            })->get();


        $bids = Bid::whereHas('product', function ($query) use ($user_id) {
            $query->where('products.user_id', $user_id);
        })->orderBy('product_id', 'desc')->get();

//        dump(\DB::getQueryLog());

        return view('user.bids', ['bids' => $bids]);

    }

    public function getApplied()
    {
        $user = Auth::user();

        $user_id = $user->id;


//        \DB::enableQueryLog();

//        $bids = Bid::whereExists(function ($query) use($user_id) {
//
//                $query->select("products.user_id")
//
//                      ->from('products')
//
//                      ->whereRaw('products.id = bids.product_id and products.user_id = ' . $user_id);
//
//            })->get();


//        $bids = Bid::whereHas('product', function ($query) use($user_id) {
//            $query->where('products.user_id', $user_id);
//        })->orderBy('product_id', 'desc')->get();

        $bids = Bid::where('user_id', $user_id)->orderBy('product_id', 'desc')->get();

//        dump(\DB::getQueryLog());

        return view('user.applied', ['bids' => $bids]);

    }

    public function getDiscuss($id)
    {
        $user = Auth::user();
        $bid_id = $id;

        $bid = Bid::findOrFail($bid_id);
        $product_id = $bid->product_id;
        $bid_user = $bid->user_id;
        $bid_comment = $bid->comments;
        $bid_amount = $bid->amount;

        $product = Product::findOrFail($product_id);
        $product_title = $product->item_name;
        $product_user = $product->user_id;

        $comments = BidComment::where('bid_id', $bid_id)->update(['is_new' => 0]);

        $comments = BidComment::where('bid_id', $bid_id)->get();

        return view('user.discuss', ['bid' => $bid, 'product' => $product, 'comments' => $comments, 'user_id' => $user->id]);

    }

    public function postDiscuss(Request $request)
    {

        $user = Auth::user();
        $user_id = $user->id;

        $bid_id = $request['bid_id'];

        $bid = Bid::findOrFail($bid_id);
        $bidder_id = $bid->user_id;

        $comments = $request['comment'];

        if ($comments == "" or $comments == null) {
            return redirect()->route('dashboard');
        } else {

            $bidComment = new BidComment();
            $bidComment->bid_id = $bid_id;
            $bidComment->user_id = $user_id;
            if ($user_id == $bidder_id) {
                $bidComment->comment_by = 'Seller';
            } else {
                $bidComment->comment_by = 'Buyer';
            }
            $bidComment->comments = $comments;

            // TODO

            // getting all of the post images
            $file = $request['attachement'];

            $destinationPath = 'uploads/comments';
            if ($file) {
                // only jpg files of less than 2MB
                $filename = $file->getClientOriginalName();
                // 5mb
                if ($file->getClientMimeType() == "image/jpeg" and $file->getClientSize() < 5242880) {

                    $fname = $bid_id . "-" . $filename;
                    // save image name
                    $bidComment->attachement = $fname;

                    //resize
                    $img = Image::make($file->getRealPath());
                    $img->resize(700, 1000, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($destinationPath . '/' . $fname);
                    // end of resize
                }
            }

            $bidComment->save();

            $notification = new Notification();
            $notification->description = '<a href="' . route('request', $bid->product->id) . '">You received a comment on project.</a>';
            if ($user_id == $bidder_id) {
                $notification->user_id = $bid->product->user_id;
            } else {
                $notification->user_id = $bid->user_id;
            }
            $notification->save();

            if ($user_id == $bidder_id) {
                // seller
                //return redirect()->route('applied');
                return redirect()->route('request', $bid->product->id);
            } else {
                // buyer
                //return redirect()->route('bids');
                return redirect()->route('request', $bid->product->id);
            }
        }
    }

    public function postUpdateBidStatus(Request $request)
    {
        // updating product and bid statuses
        // on completion, transfer money

        $user = Auth::user();
        $user_id = $user->id;

        $bid_id = $request['bid_id'];
        $bstatus = $request['status'];

        $bid = Bid::findOrFail($bid_id);
        $product_id = $bid->product_id;
        $bid_amount = $bid->amount;

        $product = Product::findOrFail($product_id);

        if ($bstatus == 'Rate') {
            return redirect()->route('get-rating', [$bid->product_id, $bid->id]);
        } else {
            //$bid = Bid::findOrFail($bid_id);

            $product->status = $bstatus;
            $product->save();

            $product_status = new ProductStatus();
            $product_status->product_id = $product_id;
            $product_status->status = $bstatus;
            $product_status->status_date = date('Y-m-d H:i:s');
            $product_status->comments = '';
            $product_status->save();

            // money from escrow if completed
            if ($bstatus == 'Completed') {

                $ledger = new Ledger();
                $ledger->auth_code = 0;
                $ledger->trans_id = 0;
                $ledger->amount = $bid_amount;
                $ledger->narration = "Amount Transffered from Escrow";
                $ledger->user_id = $bid->user_id;
                $ledger->product_id = $product_id;
                $ledger->save();

            }


            $notification = new Notification();
            $notification->description = '<a href="' . route('request', $product_id) . '">Project status changed.</a>';
            $notification->user_id = $product->user_id;
            $notification->save();

            $notification = new Notification();
            $notification->description = '<a href="' . route('request', $product_id) . '">Project status changed.</a>';
            $notification->user_id = $bid->user_id;
            $notification->save();

            Session::flash('flash_message', 'Bid status successfully updated!');

            return redirect()->route('request', $bid->product_id);
        }

    }

    public function getWallet()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $ledgers = Ledger::where('user_id', $user_id)->orderBy('id', 'desc')->paginate(25);

        return view('user.wallet', ['member' => $user, 'ledgers' => $ledgers]);
    }

    public function getRating($product_id, $bid_id)
    {
        //echo $project_id;
//        echo $bid_id;
//        echo $usertype;

        $user = Auth::user();
        $user_id = $user->id;

        $product = Product::findOrFail($product_id);
        $bid = Bid::findOrFail($bid_id);

        return view('user.rating', ['product' => $product, 'bid' => $bid, 'user_id' => $user_id]);
    }

    public function postRating(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $product_id = $request['product_id'];
        $bid_id = $request['bid_id'];

        $product = Product::findOrFail($product_id);
        $bid = Bid::findOrFail($bid_id);
        if ($product->user_id == $user_id) {
            $rating_for = $bid->user_id;
            $rating_as = 'Seller';
        } else {
            $rating_for = $product->user_id;
            $rating_as = 'Buyer';
        }

        // check if already exists
        // unique key at product_id, bid_id, user_id

        $ratingold = Rating::where('product_id', $product_id)->where('bid_id', $bid_id)->where('user_id', $user_id);
        if (count($ratingold) > 0) {
            Session::flash('flash_message', 'You already rated your experience.');
        } else {


            $rating = new Rating();

            $rating->product_id = $product_id;
            $rating->bid_id = $bid_id;
            $rating->rating_by = $user_id; // rating given by
            $rating->user_id = $rating_for; // rating for user
            $rating->rating_as = $rating_as;
            $rating->rating = $request['rating'];
            $rating->review = $request['review'];

            $rating->save();

            Session::flash('flash_message', 'Rating successfully updated!');
        }
        return redirect()->route('request', $product->id);

    }


    public function getProfile($id = 0)
    {
        $user = Auth::user();
        if ($user != null) $user_id = $user->id; else $user_id = 0;

        if ($id == 0) $id = $user_id;

        $member = User::findOrFail($id);

        $request_count = Product::where('user_id', $id)->count();

        $bid_count = Bid::where('user_id', $id)->count();

        $review_buyer = Rating::where('user_id', $id)->where('rating_as', 'Buyer')->get();

        $review_seller = Rating::where('user_id', $id)->where('rating_as', 'Seller')->get();

        return view('user.profile', ['member' => $member, 'request_count' => $request_count, 'bid_count' => $bid_count, 'review_buyer' => $review_buyer, 'review_seller' => $review_seller, 'user_id' => $user_id]);

    }

    public function getEditProfile()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $member = User::findOrFail($user_id);

        return view('user.edit-profile', ['member' => $member]);

    }

    public function postEditProfile(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $rules = array('name' => 'required', 'email' => 'required|email', 'password' => 'required|string|min:6|confirmed',);
        //, 'phone' => 'required', 'about' => 'required',

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make($request->all(), $rules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            //$messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return Redirect::route('edit-profile')->withErrors($validator)->withInput();

        } else {

            $member = User::findOrFail($user_id);

            $member->name = $request['name'];
            $member->email = $request['email'];

            $member->phone = $request['phone'];
            $member->about = $request['about'];

            // TODO

            // Image
            // getting all of the post images
            $file = $request['image'];

            $destinationPath = 'uploads/users';
            if ($file) {
                // only jpg files of less than 2MB
                $filename = $file->getClientOriginalName();
                // 5mb
                if ($file->getClientMimeType() == "image/jpeg" and $file->getClientSize() < 5242880) {

                    $fname = $user_id . "-" . $filename;
                    // save image name
                    $member->image = $fname;

                    //resize
                    $img = Image::make($file->getRealPath());
                    $img->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($destinationPath . '/' . $fname);
                    // end of resize
                }
            }


            // TODO - check and update
            if ($request['password'] != "" and $request['password'] == $request['password_confirmation']) {
                $member->password = bcrypt($request['password']);

            }

            $member->save();
            Session::flash('flash_message', 'Profile successfully updated!');
        }
        return redirect()->route('profile');
    }

    public function getSettings()
    {
        return view('user.settings');

    }

    public function getFollow($id)
    {
        $user = Auth::user();
        $user_id = $user->id;
        if ($id == $user_id) return redirect()->back();
        // check duplication
        $following = Following::where('user_id', $id)->where('follow_by', $user_id)->count();
        if ($following == 0) {
            $following = new Following();
            $following->user_id = $id;
            $following->follow_by = $user_id;
            $following->save();
            Session::flash('flash_message', 'You are Following this user!');
        }
        return redirect()->back();
    }

    public function getUnFollow($id)
    {
        $user = Auth::user();
        $user_id = $user->id;

        // check duplication
        $following = Following::where('user_id', $id)->where('follow_by', $user_id)->count();

        if ($following > 0) {
            Following::where('user_id', $id)->where('follow_by', $user_id)->delete();
            Session::flash('flash_message', 'You are NOT Following this user!');
        }
        return redirect()->back();

    }

    public function getContact()
    {
        return view('user.contact');

    }

    public function postContact(Request $request)
    {

    }

    public function postSendMessage(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $subject = (isset($request['subject']) ? $request['subject'] : 'Not Specified');
        $message = (isset($request['message']) ? $request['message'] : 'Not Specified');
        $amount = (isset($request['amount']) ? $request['amount'] : 0);

        $admin_message = new AdminMessage();
        $admin_message->user_id = $user_id;
        $admin_message->subject = $subject;
        $admin_message->message = $message;
        $admin_message->amount = $amount;
        $admin_message->save();

        Session::flash('flash_message', 'Message sent');

        return redirect()->route('wallet');


    }

    public function getReport1($id)
    {

        $user = Auth::user();
        $user_id = $user->id;

        $id2 = 0;
        $id3 = 0;

        $report_types = config('variables.report_types');

        return view('user.report', ['report_types' => $report_types, 'id' => $id, 'id2' => $id2, 'id3' => $id3]);

    }

    public function getReport2($id, $id2)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $id3 = 0;

        $report_types = config('variables.report_types');

        return view('user.report', ['report_types' => $report_types, 'id' => $id, 'id2' => $id2, 'id3' => $id3]);
    }

    public function getReport3($id, $id2, $id3)
    {

        $user = Auth::user();
        $user_id = $user->id;

        $report_types = config('variables.report_types');

        return view('user.report', ['report_types' => $report_types, 'id' => $id, 'id2' => $id2, 'id3' => $id3]);

    }

    public function postReport(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $report_type = $request['report_type'];
        $message = $request['message'];
        $product_id = $request['id'];
        $bid_id = $request['id2'];
        $comment_id = $request['id3'];

        $report = new Report();
        $report->user_id = $user_id;
        $report->report_type = $report_type;
        $report->comments = $message;
        $report->product_id = $product_id;
        $report->bid_id = $bid_id;
        $report->comment_id = $comment_id;

        $report->save();
        Session::flash('flash_message', 'Report sent to admins.');

        return redirect()->route('dashboard');

    }

    public function getPage($slug)
    {
        //$user = Auth::user();

        $page = Page::where('slug', $slug)->first();

        return view('page', ["page" => $page]);

    }


    public function getMessages()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $messages = AdminMessage::where('user_id', $user_id)->where('is_reply', 0)->orderBy('id', 'desc')->paginate(10);

        return view('user.messages', ['messages' => $messages]);
    }

    public function getMessage($id)
    {

        $user = Auth::user();
        $user_id = $user->id;

        $message = AdminMessage::findOrFail($id);

        if ($message->is_reply == 0)
            $message_id = $message->id;
        else
            $message_id = $message->is_reply;

        $thread = AdminMessage::where('id', $id)->orWhere('is_reply', $message_id)->orderby('created_at', 'DESC')->get();

        return view('user.message', ['message_id' => $message_id, 'thread' => $thread]);

    }

    public function postMessageReply(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $message_id = $request['message_id'];
        $message_body = $request['message'];

        $old_message = AdminMessage::findOrFail($message_id)->subject;

        $message = new AdminMessage();
        $message->user_id = $user_id;
        $message->subject = $old_message;
        $message->message = $message_body;
        $message->amount = 0;
        $message->is_reply = $message_id;
        $message->save();

        return redirect()->route('message', $message_id);

    }


    public function test()
    {

        $gateway = Omnipay::create('AuthorizeNet_CIM');

        $apiLoginId = '644MTyuRtws'; //getenv('AUTHORIZE_NET_API_LOGIN_ID');
        $transactionKey = '693Nv8Rx9b2MmS5t'; //getenv('AUTHORIZE_NET_TRANSACTION_KEY');

        if ($apiLoginId && $transactionKey) {
            $gateway->setDeveloperMode(true);
            $gateway->setApiLoginId($apiLoginId);
            $gateway->setTransactionKey($transactionKey);

            $formData = array('number' => '4242424242424242', 'expiryMonth' => '6', 'expiryYear' => '2018', 'cvv' => '123');

            $createCardOptions = array(
                'email' => "kaylee@serenity.com",
                'card' => $formData,
                'testMode' => true,
                'forceCardUpdate' => true
            );

            try {

                $responseCard = $gateway->createCard($createCardOptions)->send();

                echo $responseCard->getMessage();
                $cardRef = $responseCard->getCardReference();

                echo 'card';


            } catch (\InvalidCreditCardException $e) {
                exit ('card error');
            } catch (\Exception $e) {

                exit ('error' . $e->getMessage());
            };


            try {

                $response = $gateway->purchase(array('amount' => '10.00', 'currency' => 'USD', 'cardReference' => $cardRef))->send();

            } catch (\Exception $e) {
                exit ('purchase error');
            }


            echo 'response';
            //$response = $gateway->purchase(array('amount' => '10.00', 'currency' => 'USD', 'card' => $formData));


            if ($response->isRedirect()) {
                // redirect to offsite payment gateway
                $response->redirect();
            } elseif ($response->isSuccessful()) {
                // payment was successful: update database

                echo $response->getMessage();

                $res = $response->getTransactionReference();
                //echo $res->getTransId();
                echo $res;
                echo gettype($res);

                $x = json_decode($res, true);

                echo $x['approvalCode'];
                echo $x['transId'];

            } else {
                // payment failed: display message to customer
                echo 'error';
                echo $response->getMessage();
            }

        } else {
            // No credentials were found, so skip this test
            $this->markTestSkipped();
        }


    }

    public function test2()
    {

        $gateway = Omnipay::create("PayPal_Express");
        $gateway->setUsername('aa.merchant_api1.gmail.com'); //$this->USERNAME );
        $gateway->setPassword('V27QA646D9B84K3P'); //$this->PASSWORD );
        $gateway->setSignature('AFcWxV21C7fd0v3bYYYRCpSSRl31Ay93LLjsXddNXQmxsuJay28zjxck'); //$this->SIGNATURE );
        $gateway->setTestMode(true);

        $params = [
            //'transactionId' => 1,
            'amount' => '10.00',
            'currency' => 'USD',
            'cancelUrl' => 'http://xxxx.com/paypal_tests/cancel',
            'returnUrl' => 'http://xxxx.com/paypal_tests/confirm_paypal',
            'notifyUrl' => ''
        ];

        $response = $gateway->purchase($params)->send();


        if ($response->isRedirect()) {

            echo 'Redirect';
            echo $response->getMessage();

            $response->redirect();

        }

        if ($response->isSuccessful()) {
            echo 'Success';
            echo $response->getTransactionReference();
            echo $response->getMessage();
        }
    }
}