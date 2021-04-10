<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admins')->insert([
            'fname' => 'developer',
            'lname' => 'betconverter',
            'password'=> Hash::make('password1'),
            'email' => 'hello@betconverter.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);
    }
}
