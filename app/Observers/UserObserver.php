<?php

namespace App\Observers;

use App\Models\Company;
use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        // $companyData = [
        //     'title' => null,
        //     'code' => null,
        //     'vat' => null,
        //     'address' => null,
        //     'user_id' => $user->id
        // ];

        Company::firstOrCreate(['user_id' => $user->id]);
    }

    public function deleted(User $user)
    {
        Company::select('id', 'user_id')
            ->where('user_id', $user->id)->delete();
    }

    public function forceDeleted(User $user)
    {
        Company::select('id', 'user_id')
            ->where('user_id', $user->id)->delete();
    }
}
