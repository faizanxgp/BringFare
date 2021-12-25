<?php

namespace App\Http\Controllers;

use App\Admin;
use App\AdminMessage;
use App\Report;
use Illuminate\Http\Request;

use App\User;
use App\Product;
use App\Category;
use App\Trip;
use App\Bid;
use App\BidComment;
use App\BidStatus;
use App\Rating;
use App\Ledger;
use App\Page;

use Session;
use Auth;
use Validator;
use Redirect;

use Image; // for resize


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dashboard
        return view('admin');
    }


    public function getAccount()
    {

        $user = Auth::user();
        $user_id = $user->id;

        //$account = User::findOrFail($user_id);

        return view('admin.account', ['user' => $user]);

    }

    public function postAccount(Request $request)
    {


        $user = Auth::user();
        $user_id = $user->id;

        $rules = array('name' => 'required', 'email' => 'required', 'password' => 'required|string|min:6|confirmed',);

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make($request->all(), $rules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            //$messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return Redirect::route('admin.account')->withErrors($validator)->withInput();

        } else {

            $user->name = $request['name'];
            $user->email = $request['email'];
            if ($request->password != null and $request->password_confirmation != null
                and strlen($request->password) >= 6 and $request->password == $request->password_confirmation
            ) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            Session::flash('flash_message', 'Account successfully updated!');


        }


        return redirect()->route('admin.account');
    }

    public function getProducts(Request $request) {

        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        //$countries = config('variables.countries');
        //$categories = Category::all()->pluck('category', 'id');

        $search = $request->input('search');

        if ($search != null)
            $products = Product::where('id', $search)->orWhere('item_name', 'like', '%' . $search . '%')->orderBy('id', 'desc')->paginate(10);
        else
            $products = Product::orderBy('id', 'desc')->paginate(20);

        return view('admin.products', ['products' => $products]);

    }

    public function getProduct($id) {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $product = Product::findOrFail($id);

        $bids = Bid::where('product_id', $id)->get();


        return view('admin.request', ['product' => $product, 'bids' => $bids]);
    }

    public function getProductStatus($id) {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $product = Product::findOrFail($id);
        if ($product->active == 1)
            $product->active = 0;
        else
            $product->active = 1;

        $product->save();
        return redirect()->route('admin.products');
    }

    public function getUsers(Request $request) {

        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $search = $request->input('search');

        if ($search != null)
            $users = User::where('id', $search)->orWhere('email', 'like', '%' . $search . '%')->orderBy('id', 'desc')->paginate(10);
        else
            $users = User::orderBy('id', 'desc')->paginate(20);

        return view('admin.users', ['users' => $users]);
    }

    public function getUser($id) {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $user = User::findOrFail($id);

        $products = Product::where('user_id', $id)->get();
        $bids = Bid::where('user_id', $id)->get();

        return view('admin.user', ['products' => $products, 'bids' => $bids, 'user' => $user]);
    }

    public function getUserStatus($id) {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $user = User::findOrFail($id);
        if ($user->status == 1)
            $user->status = 0;
        else {
            $user->status = 1;
            $user->verified = 1;
        }
        $user->save();
        return redirect()->route('admin.users');
    }

    public function getCategories() {

        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $categories = Category::orderBy('id', 'desc')->paginate(10);

        return view('admin.categories', ['categories' => $categories]);
    }

    public function getCategory($id) {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $category = Category::findOrFail($id);

        return view('admin.category', ['category' => $category, 'user' => $adminuser]);

    }

    public function postCategory(Request $request) {

        $rules = array('category' => 'required');

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make($request->all(), $rules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            //$messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return Redirect::route('admin.category', $request->id)->withErrors($validator)->withInput();

        } else {

            $id = $request['id'];

            if ($id == 0) {
                $category = new Category();
            } else {
                $category = Category::findOrFail($id);
            }

            $category->category = $request["category"];

            $category->save();


            Session::flash('flash_message', 'Category successfully updated!');

        }

        return redirect()->route('admin.categories');
    }

    public function getMessages() {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $messages = AdminMessage::orderBy('id', 'desc')->paginate(10);

        return view('admin.messages', ['messages' => $messages]);
    }

    public function getMessage($id) {

        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $message = AdminMessage::findOrFail($id);

        if($message->is_reply == 0)
            $message_id = $message->id;
        else
            $message_id = $message->is_reply;

        $thread = AdminMessage::where('id', $id)->orWhere('is_reply', $message_id)->orderby('created_at', 'DESC')->get();

        return view('admin.message', ['message_id' => $message_id, 'thread' => $thread]);

    }

    public function postMessageReply(Request $request) {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $message_id = $request['message_id'];
        $message_body = $request['message'];

        $old_message = AdminMessage::findOrFail($message_id)->subject;

        $message = new AdminMessage();
        $message->user_id = 0;
        $message->subject = $old_message;
        $message->message = $message_body;
        $message->amount = 0;
        $message->is_reply = $message_id;
        $message->save();

        return redirect()->route('admin.message', $message_id);

    }

    /**
     * @return string
     */
    public function getLedger($id)
    {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $user = User::find($id);

        $ledgers = Ledger::where('user_id', $id)->orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.ledger', ['user' => $user, 'ledgers' => $ledgers]);
    }

    public function postLedger(Request $request) {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $auth_code = $request['auth_code'];
        $trans_id = $request['trans_id'];
        $amount = $request['amount'];
        $narration = $request['narration'];
        $user_id = $request['user_id'];



        $ledger = new Ledger();
        $ledger->auth_code = $auth_code;
        $ledger->trans_id = $trans_id;
        $ledger->amount = $amount;
        $ledger->narration = $narration;
        $ledger->user_id = $user_id;
        $ledger->save();

        Session::flash('flash_message', 'Ledger successfully updated!');
        return redirect()->route('admin.ledger', $user_id);

    }

    public function getLedgerDelete($id) {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id; // admin - not in use

        $ledger = Ledger::findOrFail($id);

        $user_id = $ledger->user_id; // user of ledger entry

        $ledger->delete();

        Session::flash('flash_message', 'Ledger entry successfully deleted!');

        return redirect()->route('admin.ledger', $user_id);
    }

    public function getReports() {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $reports = Report::orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.reports', ['reports' => $reports]);
    }

    public function getProductSuspend($id) {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $product = Product::findOrFail($id);

        $product->active = 0;
        $product->save();

        Session::flash('flash_message', 'Prodcut Suspended!');

        return redirect()->back();
    }

    public function getBidDelete($id) {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $bid = Bid::findOrFail($id);

        $bidComments = BidComment::where('bid_id', $id)->delete();

        $bid->delete();

        Session::flash('flash_message', 'Bid Deleted!');
        return redirect()->back();
    }

    public function getUserSuspend($id) {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $user = User::findOrFail($id);

        $user->status = 0;
        $user->save();
        Session::flash('flash_message', 'User Suspended!');
        return redirect()->back();
    }

    public function getPages()
    {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        $pages = Page::orderBy('id')->paginate(10);

        return view('admin.pages', ['user' => $adminuser, 'pages' => $pages]);
    }

    public function getPage($id)
    {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        if ($id == 0) {
            $page = new Page();
        } else {
            $page = Page::find($id);
        }

        return view('admin.page', ['user' => $adminuser, 'page' => $page]);
    }

    public function postPage(Request $request)
    {
        $adminuser = Auth::guard('admin')->user();
        $user_id = $adminuser->id;

        //$user = Auth::user();
        $id = $request["id"];

        $rules = array('slug' => 'required', 'title' => 'required', 'description' => 'required',);

        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = Validator::make($request->all(), $rules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            //$messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return Redirect::route('admin.page', $id)->withErrors($validator)->withInput();

        } else {

            if ($id == 0) {
                $page = new Page();
                $page->title = $request['title'];
                $page->slug = $request['slug'];
                $page->meta_description = $request['meta_description'];
                $page->description = $request['description'];
                $page->active = (isset($request['active']) ? 1 : 0);

                $page->save();
            } else {

                $page = Page::find($id);

                $page->title = $request['title'];
                $page->slug = $request['slug'];
                $page->meta_description = $request['meta_description'];
                $page->description = $request['description'];
                $page->active = (isset($request['active']) ? 1 : 0);

                $page->save();
            }

            Session::flash('flash_message', 'Email successfully updated!');

            //return redirect()->route('shippingaddress')->with('status', 'Address successfully updated!');
            return redirect()->route('admin.page', $id);
        }
    }

}
