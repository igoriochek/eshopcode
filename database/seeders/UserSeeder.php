<?php

namespace Database\Seeders;

use App\Enums\UserTypes;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
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
            'type' => UserTypes::ADMIN->value,
        ]);
        DB::table('users')->insert([
            'name' => 'igor',
            'email' => 'igor@getweb.lt',
            'password' => Hash::make('zhopazhopa'),
            'street' => "Birzelio 23",
            'house_flat' => "3/9",
            "post_index" => "LT 02178",
            'city' => "Vilnius",
            'phone_number' => "37012345678",
            'type' => UserTypes::ADMIN->value,
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@lordvisuals.lt',
            'password' => Hash::make('password'),
            'type' => UserTypes::REGISTERED_USER->value,
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@lordvisuals.lt',
            'password' => Hash::make('password'),
            'type' => UserTypes::ADMIN->value,
        ]);
    }
}
