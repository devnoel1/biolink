<?php

namespace App\Jobs\CoinbaseWebhooks;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Shakurov\Coinbase\Models\CoinbaseWebhookCall;


class HandleConfirmedCharge implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $webhookCall;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(CoinbaseWebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
       $payload = $this->webhookCall['payload'];

    //    dd($payload);

       $cutosmer_id = $payload['event']['data']['metadata']['customer_id'];

       $status = $payload['event']['data']['payments']['0']['status'];

       dd($status);

    }
}
