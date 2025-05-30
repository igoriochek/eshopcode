<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\User;
use App\Observers\UserObserver;
use App\Repositories\CartRepository;
use App\Traits\CartItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    use CartItems;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (env('APP_ENV') == 'production') {
            //Change public path to htdocs
            $this->app->bind('path.public', fn() => base_path('htdocs'));
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(CartRepository $cartRepository, Request $request)
    {
        User::observe(UserObserver::class);

        if (env('APP_ENV') == 'production') {
            //Force app to use https
            URL::forceScheme('https');
        }

        //Cart item number
        View::composer('*', function ($view) use ($cartRepository, $request) {
            if (Auth::check()) {
                $cart = $cartRepository->getOrSetCart($request);
                $cartItems = $this->getCartItems($cart);

                $view->with([
                    'siteCompany' => Company::where('user_id', null)->first(),
                    'cartItemCount' => $this->setAndGetCartItemCount($cartItems)
                ]);
            }
        });
    }
}
