<?php

namespace App\Http\Controllers\Auth;

use DB;
use Mail;
use Session;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use App\Mail\EmailVerification;

use Laravel\Socialite\Facades\Socialite;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'agree' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'image' => '',
            'about' => $data['about'],
            'phone' => $data['phone'],
            'provider' => (isset($data['provider']) ? $data['provider'] : ''),
            'provider_id' => (isset($data['provider_id']) ? $data['provider_id'] : ''),
            'status' => (isset($data['status']) ? $data['status'] : 0),
            'email_token' => str_random(10),
        ]);
    }


    public function register(Request $request)
    {
        // Laravel validation
        $validator = $this->validator($request->all());
        if ($validator->fails())
        {
            $this->throwValidationException($request, $validator);
        }
        // Using database transactions is useful here because stuff happening is actually a transaction
        // I don't know what I said in the last line! Weird!
        DB::beginTransaction();
        try
        {
            $user = $this->create($request->all());
            // After creating the user send an email with the random token generated in the create method above
            $email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->name]));
            Mail::to($user->email)->send($email);
            DB::commit();

            Session::flash('flash_message', 'Please check your email to verify it.');

            return back();
        }
        catch(Exception $e)
        {
            DB::rollback();
            return back();
        }
    }

    public function verify($token)
    {
        // The verified method has been added to the user model and chained here
        // for better readability
        User::where('email_token',$token)->firstOrFail()->verified();
        return redirect('login');
    }


    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try {

            if ($provider == 'facebook')
                $user = Socialite::driver('facebook')->user();
            else
                $user = Socialite::driver('google')->stateless()->user();
//dump($user);
            //$userModel = new User;
            $createdUser = $this->findOrCreateUser($user, $provider);
            \Auth::loginUsingId($createdUser->id);
            return redirect()->route('home');
        } catch (Exception $e) {
            dump($e);
            return redirect('login');
        }
    }

    public function findOrCreateUser($user, $provider)
    {
//        dump($user);
//        echo $provider;
//        echo 'in findorcreate';
//        echo $user->name;
//        echo $user->email;


        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        // email exists but not from same provider
        if ( $authUser2 = User::where('email', $user->email)->first() ) {
            return $authUser2;
        } else {
//            return User::create([
//                'name' => $user->name,
//                'email' => $user->email,
//                'provider' => $provider,
//                'provider_id' => $user->id
//            ]);
            $user = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'provider' => $provider,
                'provider_id' => $user->id,
                'status' => 1,
                'verified' => 1
            ]);

            // add role
            // $user->roles()->attach(Role::where('name', 'User')->first());
            return $user;
        }
    }
}
