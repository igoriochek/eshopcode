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
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => md5($faker->email),
            'password' => Hash::make($faker->password),
            'type' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'igor',
            'email' => 'igor@getweb.lt',
            'password' => Hash::make('zhopazhopa'),
        ]);
        DB::table('users')->insert([
            'name' => 'pavel',
            'email' => 'pavel@navi.agency',
            'password' => Hash::make('8RhNUNun2SqdMaF'),
        ]);
        DB::table('users')->insert([
            'name' => 'karolis',
            'email' => 'karolis@viko.lt',
            'password' => Hash::make('admin'),
        ]);
    }
}
