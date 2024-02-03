<?php

namespace App\Providers;

use App\Http\Client\CoinbasePaymentClient;
use Illuminate\Support\ServiceProvider;

class CoinbaseTransactionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CoinbasePaymentClient::class, function () {
            $client = new CoinbasePaymentClient();

            $apiKey = config('services.coinbase.api_key');
            $client->baseUrl(config('services.coinbase.base_url'))
                ->withHeader('X-CC-Api-Key', $apiKey)
                ->acceptJson();

            return $client;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
