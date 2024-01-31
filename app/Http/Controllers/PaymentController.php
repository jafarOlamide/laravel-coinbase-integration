<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index() {
        return view('payment');
    }

    //coinbase payment integration should be added here.
    public function process() {
        //code
    }
}
