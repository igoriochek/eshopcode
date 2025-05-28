<?php

namespace App\Observers;

use App\Models\Company;
use App\Models\User;

class UserObserver
{
    private function deleteUserCompany(int $userId): void
    {
        $company = Company::select('id', 'user_id')
            ->where('user_id', $userId)
            ->first();

        if (!empty($company)) $company->delete();
    }

    public function created(User $user): void
    {
        Company::firstOrCreate(['user_id' => $user->id]);
    }

    public function deleted(User $user): void
    {
        $this->deleteUserCompany($user->id);
    }


    public function forceDeleted(User $user): void
    {
        $this->deleteUserCompany($user->id);
    }
}
