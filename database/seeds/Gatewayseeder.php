<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Gatewayseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["name"=>"Paystack","status"=>true],
            ["name"=>"Flutterwave","status"=>true]
         ];

        foreach($data as $list){

            DB::table('gateways')->insert([
                'name'=>$list['name'],
                'status'=>$list['status'],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]);
    }
}
}
