<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BundleSeeder extends Seeder
{



    public function run()
    {
        DB::table('bundles')->truncate();

        $data = [
            ["name"=>"registration","cost"=>0,"value"=>50,"duration"=>14,"admin_id"=>1,'desc'=>'free registration promo','favorite'=>false],
            ["name"=>"free","cost"=>0,"value"=>3,"duration"=>7,"admin_id"=>1,'desc'=>'free units every month','favorite'=>false],
            ["name"=>"social","cost"=>300,"value"=>10,"duration"=>7,"admin_id"=>1,'desc'=>'social','favorite'=>true],
            ["name"=>"social pro","cost"=>500,"value"=>20,"duration"=>7,"admin_id"=>1,'desc'=>'social pro','favorite'=>false],
            ["name"=>"pro","cost"=>1000,"value"=>50,"duration"=>30,"admin_id"=>1,'desc'=>'pro','favorite'=>false],
            ["name"=>"enterprise","cost"=>1500,"value"=>100,"duration"=>30,"admin_id"=>1,'desc'=>'enterprise','favorite'=>false]
         ];

        foreach($data as $list){

            DB::table('bundles')->insert([
                'name'=>$list['name'],
                'cost'=>$list['cost'],
                'value'=>$list['value'],
                'duration'=>$list['duration'],
                'admin_id'=>$list['admin_id'],
                'desc'=>$list['desc'],
                'favorite'=>$list['favorite'],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]);
        }
    }
}
