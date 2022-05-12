<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class TwitterController extends Controller
{
    /**
     * Login Using Twitter
     */
    public function loginUsingTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * This Function uses OAUTH 1.
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function callbackFromTwitter()
    {
        try {
            // twitter provider doesn't use stateless.
            $user = Socialite::driver('twitter')->user();

            $saveUser = User::updateOrCreate([
                'twitter_id' => $user->getId(),
            ], [
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make($user->getName() . '@' . $user->getId()),
            ]);

            Auth::loginUsingId($saveUser->id);

            return redirect()->route('home');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
