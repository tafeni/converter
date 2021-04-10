<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Bookmaker;
use App\Models\Bundle;
use App\Models\Frombooker;
use App\Models\Trendingcode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BasicOpController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function getHomePage(){

        $win = [
            ['code'=>'BR34V','bookie'=>'22BET','influencer'=>'@tipxter1'],
            ['code'=>'BUTPU','bookie'=>'1xBET','influencer'=>'@Oddshive'],
            ['code'=>'E8SXX','bookie'=>'Betking','influencer'=>'@cindy_blog'],
            ['code'=>'77LPU','bookie'=>'1xBET','influencer'=>'@dailyboom'],
            ['code'=>'AKOGF','bookie'=>'1960bet','influencer'=>'@wozzabets'],
            ['code'=>'57ECZ','bookie'=>'Zebet','influencer'=>'@wozzabets'],
            ['code'=>'BUTPU','bookie'=>'1xBET','influencer'=>'@oddshive'],
            ['code'=>'BCTFFYY','bookie'=>'Msport','influencer'=>'@ms_finest'],
            ['code'=>'KXQQT','bookie'=>'Betking','influencer'=>'@wozzabets'],
            ['code'=>'JNQPU','bookie'=>'22BET','influencer'=>'@MrBankstips'],
        ];

        $check = Carbon::now();
        $start = $check->copy()->startOfDay();
        $end = $check->copy()->endOfDay();
        $start_prev = $start->subDay();
        $end_prev = $end->subDay();
        $bundle = Bundle::where('status',true)->where('id','>',1)->orderBy('id','ASC')->get(['id','name','cost','value','duration']);
        $latest = Trendingcode::limit(5)
                                ->orderBy('id','DESC')
                                ->get();

        $last_rec = $latest->last();

        $date = Carbon::create($last_rec->day);
        $trend_date = date_format($date,'d-m-Y');
        $toname = Bookmaker::where('status',true)->get(['name','slug']);
        $fromname = Frombooker::where('status',true)->get(['name','slug']);
        return view('home.index', compact('latest','toname','fromname','trend_date','bundle','win'));
    }

    public function getBundle(){
        $bundle = Bundle::where('status',true)
                        ->where('id','>',1)
                    ->orderBy('id',"ASC")
                    ->get(['name','favorite','value','cost','duration','desc']);
        return view('home.bundle',compact('bundle'));
    }

    public function postContact(Request $request){
        $rules = [
            'name' => 'required|min:8',
            'email' => 'required|min:8',
            'message' => 'required|min:8'
        ];

        $validator =  Validator::make($request->except('_token'), $rules);

        if ($validator->fails()){
            return response()->json([$validator->errors()->all()],401);
        }

        $mail = 'support@betconverter.com';
        //$mail = 'info@bulkbuyersconnect.com';
        $message = $request->message;
        $name = $request->name;
        $email = $request->email;
        $subject = "Contact Form";
        \Mail::to($mail)->send(new Contact($name,$email,$message,$subject));

        return response()->json(['success'=> 'Your information has been sent successfully'],200);

    }

    public function getFaq(){
        return view('home.faq');
    }

    public function getPrivacy(){
        return view('home.privacy');
    }

    public function getTerms(){
        return view('home.terms');
    }


}
