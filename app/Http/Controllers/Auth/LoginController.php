<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Models\Bundle;
use App\Models\User;
use App\Models\Wallet;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public $process = '';
    protected $redirectTo = 'user/conversion';
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        $wallet = $user->wallet;
        $created = Carbon::now();
        if($wallet->bundle_id != 7){
            $wallet->bundle_id = 7;
            $wallet->balance = 0;
            $wallet->expiry_date=$created->addDay(0);
            $wallet->save();
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('/');
    }

    public function socialLogin(Request $request)
    {
        $this->process = $request->process;
        return Socialite::driver($request->social)->redirect();
    }

    public function handleProviderCallback($social)
    {
        try {
            $userSocial = Socialite::driver($social)->user();
        }
        catch (InvalidStateException $e) {
            $userSocial = Socialite::driver($social)->stateless()->user();
        }
        $user = User::where(['email' => $userSocial->getEmail()])->first();

        if($user){
            $wallet = $user->wallet;
            if($user->email_verified_at == null){
                $user->email_verified_at = Carbon::now();
                $user->save();
            }
            elseif ($wallet->bundle_id != 7){
                $created = Carbon::now();
                $wallet->bundle_id = 7;
                $wallet->balance = 0;
                $wallet->expiry_date = $created->addDay(0);
                $wallet->save();
            }
            Auth::login($user);
            return redirect()->action('CustomerController@convertView');
        }
        else{
            $user = User::create([
                'name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'avatar' => $userSocial->getAvatar(),
                'email_verified_at'=>Carbon::now()
            ]);

            $user->userproviders()->create([
                'user_id' => $user->id,
                'provider' => $social,
                'provider_id'=> $userSocial->getId(),
                'access_token'=>$userSocial->token
            ]);
            $promo = Bundle::find(7);

            if($promo->status){
                $created = Carbon::now();
                $wallet = new Wallet([
                    'bundle_id'=>$promo->id,
                    'balance' => $promo->value,
                    'expiry_date' => $created->addDay($promo->duration)

                ]);
                $user->wallet()->save($wallet);
            }
            event(new UserRegistered($user));
            Auth::login($user);
            return redirect()->action('CustomerController@convertView');
        }
    }


}
