<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
//        for ($i=0; $i<10; $i++){
            DB::table('users')->insert([
                'name' => 'igor',
                'email' => 'igor@getweb.lt',
                'password' => Hash::make('zhopazhopa'),
            ]);
//        }
    }
}
