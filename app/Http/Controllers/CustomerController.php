<?php

namespace App\Http\Controllers;

use App\Models\Bookmaker;
use App\Models\Bundle;
use App\Models\Conversion;
use App\Models\Frombooker;
use App\Models\Phonetoken;
use App\Models\Trendingcode;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

//use GuzzleHttp\Client as http;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web','auth','verified'])->except('conversion');
        //$this->middleware('phonevalidator', ['only' => ['convertView']]);
    }

    public function index()
    {
        //
    }



    public function show()
    {
        $user = $this->getUser();

        $convert = Conversion::where('user_id',$user->id)->orderBy('id', 'DESC')->limit(3)->get();
        return view('customer.profile',compact('user','convert'));
    }

    public function edit()
    {
        //
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|min:3:unique:users',
            'phone' => 'required|min:8',
        ];

        $validator = Validator::make($this->request->except('_token'), $rules);

        if ($validator->fails()){
            return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
        }

        $user = $this->getUser();

        $user->fname = $this->request->name;
        $user->lname = $this->request->email;
        $user->gender = $this->request->phone;
        $user->save();

        //return $this->edit()->with(['success'=> true]);
        //return response()->json(['success'=> true]);
        return redirect()->back();
    }

    public function getChangePwd(){

        return view('customer.changepassword');
    }

    public function postChangePwd(Request $request){

        $rules = [
            'password' => 'required|min:8|confirmed'
        ];

        $validator =  Validator::make($request->except('_token'), $rules);

        if ($validator->fails()){
            return response()->json([$validator->errors()->all()],400);
        }

        $user = $this->getUser();
        $user->password = Hash::make($request->password);
        $user->save();

        //return redirect()->route('logout');
        return response()->json(['success'=> 'Password has been changed successfully']);
    }

    public function convertView(){
        $toname = Bookmaker::where('status',true)->get(['name','slug']);
        $fromname = Frombooker::where('status',true)->get(['name','slug']);

        $user = $this->getUser();
        $data = $user->wallet;
        $data = ($data) ? $data : null;
        return view('customer.conversion',compact('toname','fromname','data'));
    }

    public function convertPost(Request $request){
        $rules = [
            'code' => 'required|min:3',
            'toname' => 'required',
            'fromname' => 'required'
        ];

        $validator = Validator::make($request->except('_token'), $rules);

        if ($validator->fails()){
            return response()->json([$validator->errors()->all()],400);
        }

        //$user = $this->getUser();
        //$data = $user->wallet;
//        if(!$data){
//            $url = "/user/bundle/list";
//            $message = 'Please you do not have sufficient credit for code conversion';
//            return response()->json(['error'=>$message, 'url'=>$url],301);
//        }

        $from = explode("|",$request->fromname);
        $fromto = $from[0];
        $client = new \GuzzleHttp\Client();
        $toname = $request->toname;
        $fromname = $from[1];
        $code = $request->code;
        try {
            //$myrequest = $client->request('POST', 'http://10.0.2.157/betconverter/convert.php', [
            //http://52.206.231.182/betconverterv2/convert.php
            $myrequest = $client->request('POST', 'http://10.0.2.157/betconverterv2/convert.php', [
                'form_params' => [
                    'code' => $request->code,
                    'toname' => $request->toname,
                    'fromname' => $fromto
                ]
            ]);

            $myresponse = $myrequest->getBody()->getContents();

            $record = json_decode($myresponse, true);

            $state = $record['state'];
            $msg = $record['message'];
            $tranid = $record['transid'];
            $code_new = $record['code'];

            if($msg == null){
                $msg = $state;
            }
            else{
                $data = "";
                foreach ($msg as $list){
                    $data .= $list.",";
                }
                $msg = $data;
            }

            $user = $this->getUser();
            $wallet = Wallet::where('user_id', $user->id)->first();
            $booky = Bookmaker::where('slug', $toname)->first(['name', 'amount']);
            $convert = new Conversion();

            if ($state == "full" || $state == "partial complete") {
                $describe = ($state == "full") ? "100% conversion of all games":"Over 70% conversion of all games";
                //$wallet->balance = $wallet->balance - $booky->amount;
                //$wallet->balance = $wallet->balance - 1;
                //$wallet->save();

                $convert->user_id = $user->id;
                $convert->wallet_id = $wallet->id;
                $convert->transid = $tranid;
                $convert->message = $msg;
                $convert->code_old = $code;
                $convert->state = $state;
                $convert->code_new = $code_new;
                $convert->code_from = $fromname;
                $convert->code_to = $booky->name;
                $convert->amount = $booky->amount;
                $convert->save();

            }
            elseif (($state == "full" || $state == "partial complete") & (empty($code_new))) {
                $state = "Pending";
                $code_new = "Not Available";
                $msg = "Record not available";
                return response()->json(['code' => $code_new, 'message' => $msg, 'state' => $state], 401);

            }
            elseif ($tranid) {
                if($code_new == null){
                    $describe = "No conversion was done";
                }
                else{
                    $describe = "Less than 70% conversion of all games";
                }
                $convert->user_id = $user->id;
                $convert->wallet_id = $wallet->id;
                $convert->transid = $tranid;
                $convert->message = $msg;
                $convert->code_old = $code;
                $convert->code_new = ($code_new == null) ? $state : $code_new;
                $convert->code_from = $fromname;
                $convert->code_to = $booky->name;
                $convert->amount = 0;
                $convert->state = $state;
                $convert->save();

            }
            elseif ($state == "fail" || $state == "partial fail"){
                $describe = "Less than 70% conversion of all games";
            }
            elseif($state == null){
                $state = "Conversion Failed";
                $describe = "0% conversion of all games";
            }

            if(!empty($msg)){
                $games = explode(",", $msg);
                $msg = $games[0];
            }else{
                $msg ="";
            }
            $code_new = ($code_new == null) ? "No code" : $code_new;
            return response()->json(['code' => $code_new, 'message' => $msg, 'state' => $state,'describe'=>$describe], 200);
        }
        catch (Throwable $e ){
            $state = "Pending";
            $code_new = "Not Available";
            $msg = "Record not available";
           // return response()->json(['code' => $code_new, 'message' => $msg, 'state' => $state], 401);
            return response()->json(['error' => "Data not Available"],500);

        }

        }

    public function getBundle(Request $request){
        $bundle = Bundle::where('status',true)->where('id','>',1)->get(['id','name','cost','value','duration']);

        if($request->ajax()){
            $bundle = Bundle::find($request->id);
            $user = $this->getUser();
            if ($bundle){
                if($bundle->id === 1){
                    return view('customer.activeplan', compact('bundle','user'));
                }
                $names = explode(' ',$user->name);
                $fname = $names[0];
                $lname = isset($names[1]) ? $names[1] : "no lastname";

                return view('customer.purchase',compact('bundle','user','fname','lname'));
            }
        }

        return view('customer.bundlelist',compact('bundle'));
    }

    public function getTrending(Request $request){
        $date = Carbon::today();
        $date = $date->format('Y-m-d');
        $data = [
            '5-10'=>'5-10','11-25'=>'11-25','25 and Above'=>'25'
        ];

        $trending = Trendingcode::where('day',$date)->orderBy('id','Desc')->paginate(10);

        if($request->ajax()){
            $record = explode('-',$request->odds);

            if(isset($record[1])){
                $trending = Trendingcode::where('odd','>=',floatval($record[0]))
                                        ->where('odd','<=',floatval($record[1]))
                                        ->where('day',$date)
                                        ->orderBy('id','DESC')
                                        ->paginate(15);
                return view('customer.partials.trendtable', compact('trending'));
            }else{

                $trending = Trendingcode::where('odd','>=',floatval($record[0]))
                    ->where('day',$date)
                    ->orderBy('odd','DESC')
                    ->paginate(15);

                return view('customer.partials.trendtable', compact('trending'));

            }
        }
        return view('customer.trending',compact('trending','data'));
    }

    public function sendPhoneCode(Request $request){

        if ($request->ajax()){

            $user = $this->getUser();

            $rules = [
                'phone' => 'required|min:8',
            ];

            $validator = Validator::make($request->except('_token'), $rules);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->getMessageBag()->toArray()],404);
            }
            $checkphone = User::where(['phone'=>$request->phone,'id'=>$user->id])->first();
            if(!$checkphone){
                return response()->json('This phone is already been used',404);
            }
            else {
                $user->phone = $request->phone;
                $user->save();

                $state = $this->sendCode($request->phone, $user->id);
                if ($state) {
                    return response()->json(['success' => true, 'message' => 'An SMS has been sent to the phone number provide']);
                } else {
                    return response()->json(['message' => "An SMS was not sent, please confirm your phone number"],404);
                }
            }

        }

    }

    public function verifyPhoneCode(Request $request){

        if ($request->ajax()){

            $user = $this->getUser();

            $rules = [
                'code' => 'required|numeric|min:5',
            ];

            $validator = Validator::make($request->except('_token'), $rules);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->getMessageBag()->toArray()]);
            }

            $check = Phonetoken::where(['user_id'=>$user->id,'code'=>$request->code])->first();
            if ($check){
                $user->phone_verify = true;
                $user->save();
                return response()->json(['success'=> true]);
            }
            return response()->json(['error'=> true,'message'=>'Wrong code was entered']);
        }
    }

    private function sendCode($phonex,$id){

        $token = $this->generatePhoneCode();
        $check = Phonetoken::where('user_id',$id)->first();
        if (!$check){
            $state = $this->smsUserCode($phonex,$token);
            if($state){
                $phone = new Phonetoken();
                $phone->user_id = $id;
                $phone->code = $token;
                $phone->status = true;
                $phone->created_at = Carbon::now();
                $phone->updated_at = Carbon::now();
                $phone->save();
                return true;
            }
        }
        else{
            $state = $this->smsUserCode($phonex,$token);
            if($state){
                $check->code = $token;
                $check->save();
                return true;
            }
        }
    }

    private function generatePhoneCode(){
        $faker = Faker::create();
        return $faker->numberBetween(10000,99999);
    }

    private function smsUserCode($phone,$code){

        $user = env('SMS_USER','betconverter');
        $password = env('SMS_PASSWORD','wWf82dku');
        $shortcode = env('SMS_SHORTCODE','20052');
        $msg = 'As part of your verification, use this code '.$code.' to complete the process on Betconverter.com';
        $url = "http://52.206.231.182/routesms/?username=$user&password=$password&shortcode=$shortcode&phoneNo=$phone&message=$msg&dlr=1";
        $client = new \GuzzleHttp\Client();

        try {
            $myrequest = $client->request('GET', $url);
            $myresponse = $myrequest->getBody()->getContents();
            return json_decode($myresponse, true);
        }
        catch (Throwable $e ){
            return response()->json(['error' => "Data not Available"],500);
        }

    }

    private function getUser(){
        return Auth::user();
    }




}
