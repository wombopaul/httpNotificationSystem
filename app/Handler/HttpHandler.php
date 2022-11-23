<?php

namespace App\Handler;

use Spatie\WebhookClient\Jobs\ProcessWebhookJob;

class HttpHandler extends ProcessWebhookJob
{
    public function handle()
    {
        logger('Forwarded to subscribing Server');
        logger('url: '. $this->webhookCall->url);
        logger('payload: '. json_encode($this->webhookCall->payload));
    }
}
