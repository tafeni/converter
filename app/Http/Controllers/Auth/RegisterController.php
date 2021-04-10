<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Models\Bundle;
use App\Models\User;
use App\Models\Wallet;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = 'user/conversion';

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
            'name' => ['required', 'string', 'max:100','regex:/^[a-zA-Z][a-zA-Z ]*$/'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required', 'string', 'min:11', 'max:11','unique:users','regex:/^[0][7-9][0-1]\d{8}$/'],
            'terms' => ['required'],
            //'over' => ['required'],

        ]);
    }


    protected function create(array $data)
    {
        $user =  User::create([
            'name' => strtolower($data['name']),
            'email' => strtolower($data['email']),
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

        $promo = Bundle::find(7);

        if($promo->status){
            $created = Carbon::now();
            $wallet = new Wallet([
                'bundle_id'=>$promo->id,
                'balance' => $promo->value,
                'expiry_date' => $created->addDay(0),
            ]);

            $user->wallet()->save($wallet);
        }

        event(new UserRegistered($user));

        return $user;
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

}
