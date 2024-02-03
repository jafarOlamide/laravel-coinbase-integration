<?php

namespace App\Http\Controllers;

use App\Http\Client\CoinbasePaymentClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoinbaseChargeTransactionController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'amount' => ['required'],
        ]);
    }
    public function create(Request $request, CoinbasePaymentClient $coinbaseClient)
    {
        $this->validator($request->all())->validate();

        $payment_data = [
            'name' => $request->name,
            'description' => $request->description,
            'amount'    => $request->amount
        ];

        $coinbaseClient->createCharge($payment_data);
    }
}
