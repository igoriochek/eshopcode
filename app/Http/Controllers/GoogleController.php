<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Login Using Google
     */
    public function loginUsingGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try{
            $user = Socialite::driver('google')->stateless()->user();

            $saveUser = User::updateOrCreate([
               'google_id' => $user->getId(),
            ],[
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password'=>Hash::make($user->getName().'@'.$user->getId()),
            ]);

            Auth::loginUsingId($saveUser->id);

            return redirect()->route('home');
        }  catch (\Throwable $th){
            throw $th;
        }
    }
}
