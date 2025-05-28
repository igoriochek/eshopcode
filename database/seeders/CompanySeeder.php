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
        $companiesTable = DB::table('companies');

        $companiesTable->insert([
            'title' => 'Consultus Magnus',
            'code' => '223946830',
            'vat' => null,
            'address' => 'Žalgirio 93, Vilnius',
            'user_id' => null
        ]);

        $userCount = User::count();

        for ($userId = 1; $userId <= $userCount; $userId++) {
            $companiesTable->insert(['user_id' => $userId]);
        }
    }
}
