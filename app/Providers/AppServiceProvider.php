<?php

namespace App\Providers;

use App\Models\Bill;
use App\Models\PaymentMethod;
use App\Models\Pix;
use App\Models\Product;
use App\Models\ProductSale;
use App\Models\Sale;
use App\Models\User;
use App\Observers\BaseObserver;
use App\Observers\ProductSaleObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // @codeCoverageIgnoreStart
        if ($this->app['env'] === 'local') {
            $this->app['url']->forceRootUrl(config('app.url'));
        }
        // @codeCoverageIgnoreEnd

        User::observe(BaseObserver::class);
        Product::observe(BaseObserver::class);
        Sale::observe(BaseObserver::class);
        PaymentMethod::observe(BaseObserver::class);
        ProductSale::observe(ProductSaleObserver::class);
        Bill::observe(BaseObserver::class);
    }
}
