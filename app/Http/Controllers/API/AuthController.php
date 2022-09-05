<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCartAPIRequest;
use App\Http\Requests\API\UpdateCartAPIRequest;
use App\Models\Cart;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\User;

class AuthController extends AppBaseController
{
    //

    public function login(Request $request)
    {
        if (!\Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function me(Request $request)
    {
        return $request->user();
    }
    public function allusers(Request $request)
    {
        $users = User::select( "id", "name", "email", "provider", "provider_id", "type", "street",
            "house_flat", "post_index", "city", "phone_number", "facebook_id", "google_id", "twitter_id")->get();
        return $this->sendResponse($users->toArray(), 'Products retrieved successfully');
    }
}
