<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;
class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $user = Auth::user();
        if (!$user){
            Flash::success('No user found!');
            return view('home');
        }

        return view('user_views.user.profile', [
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {

        $request->validate(User::$rules);
        $id = Auth::user()->id;

        $user = User::find($id);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->street = $request->street;
        $user->name = $request->name;
        $user->name = $request->name;
        $user->name = $request->name;
        $user->save();

        Flash::success(__('messages.userupdated'));



        return redirect(route('userprofile'));
    }
}
