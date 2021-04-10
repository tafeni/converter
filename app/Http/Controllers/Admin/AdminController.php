<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Bookmaker;
use App\Models\Conversion;
use App\Models\Frombooker;
use App\Models\Trendingcode;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Throwable;

class AdminController extends Controller
{
    public $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware(['admin','backinvalidate']);

    }

    public function index()
    {
        return view('admin.home');
    }

    public function conversion(Request $request){
        try {
            $client = new \GuzzleHttp\Client();
            $data = $client->get('http://10.0.2.157/betconverter/bookmakers.php')->getBody();
            $record = json_decode($data, true);
            if($request->name == "fromname"){
                $record = $record['fromname'];
                $book = [];
                foreach ($record as $list) {
                    $book[] = [
                        // 'admin_id' => 1,
                        'name' => $list['name'],
                        'slug' => $list['slug'],
                        //'amount'=>0,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];

                }
                Frombooker::insert($book);
                return "From Bookers Inserted";
            }
            else{
                $record = $record['toname'];
                $book = [];
                foreach ($record as $list) {
                    $book[] = [
                        'admin_id' => 1,
                        'name' => $list['name'],
                        'slug' => $list['slug'],
                        'amount'=>1,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];

                }
                Bookmaker::insert($book);
                return "Bookmakers Inserted";
            }

            //return view('customer.conversion');
        }
        catch(throwable $e){
            return response()->json("Server Connection issues");
        }
    }

    public function getBookmaker(){
        $book = Bookmaker::all();
        return response()->json($book,200);
    }


    public function treadCodePost(Request $request){
        $this->validate($request, [
            'influencer' => 'required|min:3',
            'code' => 'required|min:3',
            'odd' => 'required|min:1',
            'booky' => 'required|min:3',
        ]);

        $trending = new Trendingcode();
        $trending->code = $request->code;
        $trending->influencer = $request->influencer;
        $trending->odd = $request->odd;
        $trending->booky = $request->booky;
        $trending->day = $request->day;

        $trending->save();

        return redirect()->back()->withSuccess('Trending Code Successfully Entered');
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function getConversionCode(){
        $ds = Carbon::create('2021-03-26 00:00:00');
        $de = Carbon::create('2021-04-01 11:59:59');
        $data = Conversion::where([['state','=','partial fail']])
                            ->whereBetween('created_at',[$ds,$de])
                            ->get(['transid','code_old','state','code_from','code_to','created_at']);

   return $data;
    }

    public function resetUnit(){
        $data = Payment::distinct()->get(['wallet_id']);
        $record=[];
        foreach($data as $list){
            array_push($record, $list->wallet_id);
        }

        $wallet = Wallet::all(['id','balance']);
        $all = [];
        foreach ($wallet as $item){

            if (in_array($item->id,$record)){
                break;
            }
            else{
                DB::table('wallets')->where('id', $item->id)->update(['balance' =>10]);
            }
        }

        return "Completed";
    }

    public function details(Request $request){

//        if($request->ajax()){
//
//            $details['start'] = Carbon::create($request->start)->copy()->startOfDay();
//            $details['end'] = Carbon::create($request->end)->copy()->endOfDay();
//            dd($details);
//            $details = [];
//            $user = User::where('status',true)->get()->count();
//            $usert = User::whereBetween('created_at', [$ds , $de])->get()->count();
//            $user_week = Conversion::whereBetween('created_at', [$ds , $de])
//                ->distinct('user_id')->count();
//
//            $conversion_week = Conversion::whereBetween('created_at', [$ds , $de])
//                ->distinct('user_id')->count();
////        $to = Conversion::selectRaw('COUNT(DISTINCT(user_id)),code_to')
////            ->groupBy('code_to')
////            ->get();
//            $details['user'] = $user;
//            $details['user_week_registration'] = $usert;
//            $details['conv_week'] = $conversion_week;
//            // $details['conv_user'] = $user_week;
//            $details['engagement'] = ($user_week/$user) * 100;
//            return response()->json($details);
//        }
//
//        return view('admin.analysis');
        $ds = Carbon::create('2021-03-19')->copy()->startOfDay();
        $de = Carbon::create('2021-03-25')->copy()->endOfDay();
        $details = [];
        $user = User::where('status',true)->get()->count();
        $usert = User::whereBetween('created_at', [$ds , $de])->get()->count();
        $user_week = Conversion::whereBetween('created_at', [$ds , $de])
            ->distinct('user_id')->count();
        $conversion = Conversion::whereBetween('created_at', [$ds , $de])->get()->count();
        $conversion_week = Conversion::whereBetween('created_at', [$ds , $de])
            ->distinct('user_id')->count();
//        $to = Conversion::selectRaw('COUNT(DISTINCT(user_id)),code_to')
//            ->groupBy('code_to')
//            ->get();
        $details['user'] = $user;
        $details['user_week_registration'] = $usert;
        $details['conv_week'] = $conversion_week;
        // $details['conv_user'] = $user_week;
        $details['engagement'] = ($user_week/$user) * 100;
        $details['full_conversion'] = $conversion;
        return $details;

    }



}

