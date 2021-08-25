<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Shakurov\Coinbase\Models\CoinbaseWebhookCall;

class MyCustomWebhookCall extends CoinbaseWebhookCall
{
    use HasFactory;

    public function process()
    {
        // do some custom stuff beforehand

        parent::process();

        // do some custom stuff afterwards
    }
}
