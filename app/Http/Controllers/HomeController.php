<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Bid;
use App\Category;
use App\Trip;

//use Session;
//use Auth;
//use Validator;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'search', 'request', 'postSearch']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function search()
    {
        $user = \Auth::user();
        if ($user == null) {
            $user_id = 0;
        } else {
            $user_id = $user->id;
        }


        $countries = config('variables.countries');
        $package_sizes = config('variables.package_sizes');
        $categories = Category::orderBy('id')->get();

        $search_arr = Array("searchtxt" => "", "category_arr" => array(), "country" => "", "dcountry" => "", "dcity" => "", "price1" => "0", "price2" => "1000", "before_date" => "", "package_sizes" => array(), "project_status" => array(), "followers" => array() );

        $products = Product::orderBy('id', 'desc')->limit(12)->get();

        return view('search', ['products' => $products, 'countries' => $countries, 'categories' => $categories, 'package_sizes' => $package_sizes, 'search' => $search_arr]);
    }

    public function postSearch(Request $request) {

        $user = \Auth::user();
        if ($user == null) {
            $user_id = 0;
        } else {
            $user_id = $user->id;
        }

        $searchtxt = $request['searchtxt'];

        $category_arr = (isset($request['category']) ? $request['category'] : Array() );
        $country = (isset($request['country']) ? $request['country'] : '');
        $dcountry = (isset($request['d_country']) ? $request['d_country'] : '');
        $dcity = $request['dcity'];
        $price1 = $request['price1'];
        $price2 = $request['price2'];
        $before_date = (isset($request['before_date']) ? $request['before_date'] : '');
        $package_sizes = (isset($request['package_sizes']) ? $request['package_sizes'] : array());
        $project_status = (isset($request['project_status']) ? $request['project_status'] : array());
        $followers = (isset($request['followers']) ? $request['followers'] : array());




//
//        $s_type = $request['s_type'];
//        $s_text = $request['s_text'];
//        $s_filter = $request['s_filter'];
//        $s_country = $request['s_country'];
//
//        $chk_open = (isset($request['chk_open']) ? 1 : 0 );
//        $chk_process = (isset($request['chk_process']) ? 1 : 0 );
//        $chk_completed = (isset($request['chk_completed']) ? 1 : 0 );

        $search_arr = compact("searchtxt", "category_arr", "country", "dcountry", "dcity", "price1", "price2", "before_date", "package_sizes", "project_status", "followers");

        $countries = config('variables.countries');
        //$package_sizes = config('variables.package_sizes');
        $categories = Category::orderBy('id')->get();


//        \DB::enableQueryLog();

        $qry = Product::whereBetween('price', [$price1, $price2])->where('active', 1);

        if ($searchtxt != '')
            $qry = $qry->where('item_name', 'LIKE', '%' . $searchtxt . '%');

        $category = implode(",", $category_arr);
        if ($category != '')
            $qry = $qry->whereIn('category_id', [$category]);

        if ($country != '')
            $qry = $qry->where('country', $country);

        if ($dcountry != '') {
            $qry = $qry->where('dcountry', $dcountry);
            if ($dcity != '') {
                $qry = $qry->where('dcity', $dcity);
            }
        }

        if ($before_date != '')
            $qry = $qry->where('require_date', '<=', $before_date);

        //$package_size = "'" . implode("','", $package_sizes) . "'"; echo $package_size;

        if (!empty($package_sizes)) {
            //$qry = $qry->whereIn('package_size', [$package_sizes]);
            $qry = $qry->Where(function ($query) use ($package_sizes) {
                for ($i = 0; $i < count($package_sizes); $i++) {
                    $query->orwhere('package_size', $package_sizes[$i]);
                }
            });
        }
        if (!empty($project_status)) {
            //$qry = $qry->whereIn('status', [implode(",", $project_status)]);
            $qry = $qry->Where(function ($query) use ($project_status) {
                for ($i = 0; $i < count($project_status); $i++) {
                    $query->orwhere('status', $project_status[$i]);
                }
            });
        }


        $products = $qry->orderBy('id', 'desc')->limit(12)->get();

//        dump(\DB::getQueryLog());

        return view('search', ['products' => $products, 'countries' => $countries, 'categories' => $categories, 'package_sizes' => $package_sizes, "search" => $search_arr]);
    }

    public function getSearchCategory($id) {

        $user = \Auth::user();
        if ($user == null) {
            $user_id = 0;
        } else {
            $user_id = $user->id;
        }

        $countries = config('variables.countries');
        $categories = Category::orderBy('id')->get();

        $products = Product::where('category_id', $id)->orderBy('id', 'desc')->limit(12)->get();

        return view('search', ['products' => $products, 'countries' => $countries, 'categories' => $categories]);
    }

    public function searchTrips()
    {
        $user = \Auth::user();
        if ($user == null) {
            $user_id = 0;
        } else {
            $user_id = $user->id;
        }
        $countries = config('variables.countries');

        $trips = Trip::orderBy('id', 'desc')->limit(12)->get();

        return view('search-trips', ['trips' => $trips, 'countries' => $countries ]);
    }

    public function postSearchTrips(Request $request) {

        $user = \Auth::user();
        if ($user == null) {
            $user_id = 0;
        } else {
            $user_id = $user->id;
        }
        $countries = config('variables.countries');

        $f_country = $request['f_country'];
        $t_country = $request['t_country'];
        $from_date = $request['from_date'];
        $upto_date = $request['upto_date'];



        $qry = Trip::where('country_to', $t_country);

//        if ($chk_open)
//            $qry = $qry->where('status', 'Open');
//
//        if ($chk_completed)
//            $qry = $qry->where('status', 'Completed');

        $trips = $qry->orderBy('id', 'desc')->limit(12)->get();

        return view('search-trips', ['trips' => $trips, 'countries' => $countries]);
    }



    public function request($id = 0)
    {
        // product

        $user = \Auth::user();
        if ($user == null) {
            $user_id = 0;
        } else {
            $user_id = $user->id;
        }

        $product = Product::findOrFail($id);

        // must be active
        if ($product->active != 1)
            return Redirect::route('home');

        $bids = Bid::where('product_id', $product->id)->get();

        $recent = Product::where('active', 1)->orderBy('id', 'DESC')->limit(4)->get();
        return view('request', ['product' => $product, 'bids' => $bids, 'user_id' => $user_id, 'recent' => $recent]);
    }
}
