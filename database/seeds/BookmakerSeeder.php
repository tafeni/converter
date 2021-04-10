<?php

use Illuminate\Database\Seeder;

class BookmakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["name"=>"bundle 1","cost"=>50,"value"=>1,"duration"=>7,"admin_id"=>1],
            ["name"=>"bundle 2","cost"=>300,"value"=>10,"duration"=>7,"admin_id"=>1],
            ["name"=>"bundle 3","cost"=>500,"value"=>20,"duration"=>7,"admin_id"=>1],
            ["name"=>"bundle 4","cost"=>1000,"value"=>50,"duration"=>30,"admin_id"=>1],
            ["name"=>"bundle 5","cost"=>1500,"value"=>100,"duration"=>30,"admin_id"=>1]
        ];
    }
}
