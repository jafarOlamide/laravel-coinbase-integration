<?php

namespace App\Http\Client;

use Illuminate\Http\Client\PendingRequest;

class CoinbasePaymentClient extends PendingRequest
{
    public function createCharge(array $data)
    {
        $response = $this->post('/charges', [
            "name"          => $data['name'],
            "description"   => $data['description'],
            "pricing_type"  => config('services.coinbase.pricing_types.fixed_price'),
            "local_price"   => [
                "amount" => $data['amount'],
                "currency" => config('services.coinbase.charge_currency')
            ]
        ]);


        return $response->json();
    }
}
