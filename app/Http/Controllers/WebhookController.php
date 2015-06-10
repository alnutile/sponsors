<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Laravel\Cashier\WebhookController as BaseController;

class WebhookController extends BaseController
{
    public function handleWebhook()
    {
        $payload = $this->getJsonPayload();

        Log::info("Webhook from Stripe");
        Log::info(print_r($payload, 1));
        parent::handleWebhook();
    }
}