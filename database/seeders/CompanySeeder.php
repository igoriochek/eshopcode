<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userCount = User::count();

        for ($userId = 1; $userId <= $userCount; $userId++) {
            DB::table('companies')->insert([
                'user_id' => $userId
            ]);
        }
    }
}
