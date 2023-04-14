<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    const USER = 0;
    const ADMIN = 1;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('users')->insert([
            [
                'name' => 'igor',
                'email' => 'igor@getweb.lt',
                'password' => Hash::make('zhopazhopa'),
                'street' => "Birzelio 23",
                'house_flat' => "3/9",
                "post_index" => "LT 02178",
                'city' => "Vilnius",
                'phone_number' => "37012345678",
                'type' => self::ADMIN,
            ],
            [
                'name' => 'Client',
                'email' => 'client@krims.lt',
                'password' => Hash::make('password'),
                'street' => $faker->streetName(),
                'house_flat' => rand(1, 30).'/'.rand(1, 100),
                'post_index' => $faker->postcode(),
                'city' => $faker->city(),
                'phone_number' => $faker->phoneNumber(),
                'type' => self::USER
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@krims.lt',
                'password' => Hash::make('password'),
                'street' => $faker->streetName(),
                'house_flat' => rand(1, 30).rand(1, 100),
                'post_index' => $faker->postcode(),
                'city' => $faker->city(),
                'phone_number' => $faker->phoneNumber(),
                'type' => self::ADMIN
            ]
        ]);
    }
}
