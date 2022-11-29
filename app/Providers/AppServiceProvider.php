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
        //$this->app->bind('path.public', function() {
        //   return base_path('htdocs');
        //});
    }

    public function boot(CartRepository $cartRepository, Request $request)
    {
        Schema::defaultStringLength(191);

        //URL::forceScheme('https');

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
