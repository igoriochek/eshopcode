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
        return Socialite::driver('twitter')
            ->with(['include_email' => 'true', 'include_entities' => 'false', 'skip_status' => 'true'])
            ->redirect();
    }

    public function callbackFromTwitter()
    {
        try{
            // twitter provider doesn't use stateless.
            $user = Socialite::driver('twitter')->stateless()->user();

            ddd($user);

            $saveUser = User::updateOrCreate([
                'twitter_id' => $user->getId(),
            ],[
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password'=>Hash::make($user->getName().'@'.$user->getId()),
            ]);

            Auth::loginUsingId($saveUser->id);

            return redirect()->route('home');
        }catch (\Throwable $th){
            throw $th;
        }
    }
}
