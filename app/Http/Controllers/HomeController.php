<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use App\Models\Phonetoken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        $user = $this->getUser();
        $bundle = "None";
        $credit = 0;
        $convert = 0;

        $phone_v = $user->phone_verify;
        $gen_token = Phonetoken::where('user_id',$user->id)->first();
        if($user->wallet) {
            $bundle = $user->wallet->bundle->name;
            $credit = $user->wallet->balance;
            $convert = $user->conversions()->count();
            //$expiry = $user->wallet->expiry_date;
            $status = $user->wallet->status;
        }
        $expiry = "None";

        return view('customer.dashboard', compact('phone_v','user','gen_token','bundle','credit','convert','expiry','status'));
    }


    private function getUser(){
        return Auth::user();
    }

}
