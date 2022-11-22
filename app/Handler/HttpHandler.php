<?php

namespace App\Handler;

use Spatie\WebhookClient\Jobs\ProcessWebhookJob;

class HttpHandler extends ProcessWebhookJob
{
    public function handle()
    {
        logger('Test');
        logger($this->webhookCall);
    }
}
