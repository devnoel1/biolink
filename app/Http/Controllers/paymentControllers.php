<?php

namespace App\Http\Controllers;

// use App\Help\Coinbase;

use App\Jobs\CoinbaseWebhooks\HandleConfirmedCharge;
use App\Listeners\ChargeConfirmedListener;
use App\Models\MyCustomWebhookCall;
use Illuminate\Http\Request;
use Shakurov\Coinbase\Facades\Coinbase;
use Shakurov\Coinbase\Models\CoinbaseWebhookCall;

// use Shakurov\Coinbase\Coinbase;

class paymentControllers extends Controller
{
    //

    public function index()
    {
        return view('payments.index');
    }

    public function pay(Request $request)
    {
        $amount = $request->amount;

        $coinbase =  new Coinbase();

        $charge = Coinbase::createCharge([
            'name' => 'Name',
            'description' => 'Description',
            'local_price' => [
                'amount' => 100,
                'currency' => 'USD',
            ],
            'pricing_type' => 'fixed_price',
            "redirect_url"=> url('')."/cancel-callback",
            "cancel_url"=> url('')."/cancel-callback",
            "metadata"=>[
                'customer_id'=>1123,
            ]
        ]);

        return $charge;


       return redirect($charge['data']['hosted_url']);

    }

    public function successCallback()
    {
        HandleConfirmedCharge::dispatch(CoinbaseWebhookCall::find(1));
    }

    public function cancelCallback()
    {
        return "canceled";
    }
}

