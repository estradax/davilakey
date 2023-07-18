<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
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
        App::singleton(\Pb\Product\ProductServiceClient::class, function () {
            return new \Pb\Product\ProductServiceClient('localhost:50051', [
                'credentials' => \Grpc\ChannelCredentials::createInsecure()
            ]);
        });
    }
}
