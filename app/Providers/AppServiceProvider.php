<?php

namespace App\Providers;

use App\Repositories\CartRepository;
use App\Traits\CartItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    use CartItems;

    public function register()
    {
        //Change public path to public_html
        //$this->app->bind('path.public', function() {
        //   return base_path('public_html');
        //});
    }

    public function boot(CartRepository $cartRepository, Request $request)
    {
        //Force app to use https
        //URL::forceScheme('https');

        //Schema default string error fix
        Schema::defaultStringLength(191);

        //Cart item number
        View::composer('*', function($view) use($cartRepository, $request)
        {
            if (Auth::check()) {
                $cart = $cartRepository->getOrSetCart($request);
                $cartItems = $this->getCartItems($cart);

                $view->with('cartItemCount', $this->setAndGetCartItemCount($cartItems));
            }
        });
    }
}
