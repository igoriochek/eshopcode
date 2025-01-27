<?php

namespace App\Providers;

use App\Repositories\CartRepository;
use App\Traits\CartItems;
use App\Traits\ProductRatings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    use CartItems;
    use ProductRatings;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (config('app.env') == 'production') {
            //Change public path to htdocs
            $this->app->bind('path.public', fn () => base_path('htdocs'));
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(CartRepository $cartRepository, Request $request)
    {
        if (config('app.env') == 'production') {
            //Force app to use https
            URL::forceScheme('https');
        }

        //Cart items
        View::composer('*', function ($view) use ($cartRepository, $request) {
            if (Auth::check()) {
                $cart = $cartRepository->getOrSetCart($request);
                $cartItems = $this->getCartItems($cart);

                foreach ($cartItems as $item) {
                    $sumAndCount = $this->calculateRatingSumAndCount($this->getProductRatings($item->product->id));
                    $sum = $sumAndCount['sum'];
                    $count = $sumAndCount['count'];
                    $item->product->average = $this->calculateAverageRating($sum, $count);
                }

                $view->with([
                    'cart' => $cart,
                    'cartItems' => $cartItems,
                    'cartItemCount' => $this->setAndGetCartItemCount($cartItems)
                ]);
            }
        });
    }
}