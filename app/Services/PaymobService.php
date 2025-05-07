<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PaymobService
{
    protected $apiKey;
    protected $integrationKey;
    protected $iframeId;
    protected $token;

    // Initialize API credentials from .env
    public function __construct()
    {
        $this->apiKey = env('PAYMOB_API_KEY');
        $this->integrationKey = env('PAYMOB_INTEGRATION_ID');
        $this->iframeId = env('PAYMOB_IFRAME_ID');
    }

    // Get authentication token from Paymob
    public function getAuthToken()
    {
        $response = Http::post('https://accept.paymobsolutions.com/api/auth/tokens', [
            'api_key' => $this->apiKey,
        ]);

        $this->token = $response['token'];
        return $this->token;
    }

    // Create payment link for the user
    public function createPaymentLink($amount, $first_name, $last_name, $email, $phone, $city, $user_id)
    {
        // Step 1: Get token if not already set
        if (!$this->token) {
            $this->getAuthToken();
        }

        // Step 2: Create order in Paymob
        $orderResponse = Http::withToken($this->token)->post('https://accept.paymobsolutions.com/api/ecommerce/orders', [
            'delivery_needed' => false,
            'amount_cents' => $amount * 100,
            'currency' => 'EGP',
            'items' => [],
        ]);
        $orderId = $orderResponse['id'];

        // Step 3: Generate payment key with user and billing info
        $paymentKeyResponse = Http::withToken($this->token)->post('https://accept.paymobsolutions.com/api/acceptance/payment_keys', [
            'amount_cents' => $amount * 100,
            'expiration' => 3600,
            'order_id' => $orderId,
            'extra' => [
                'userId' => $user_id,
            ],
            'billing_data' => [
                "apartment" => "NA",
                "email" => $email,
                "floor" => "NA",
                "first_name" => $first_name,
                "last_name" => $last_name,
                "street" => "NA",
                "building" => "NA",
                "phone_number" => $phone,
                "shipping_method" => "NA",
                "postal_code" => "NA",
                "city" => $city,
                "country" => "EG",
                "state" => "NA"
            ],
            'currency' => 'EGP',
            'integration_id' => $this->integrationKey,
        ]);

        $paymentToken = $paymentKeyResponse['token'];

        // Step 4: Return the full payment link
        $paymentLink = "https://accept.paymob.com/api/acceptance/iframes/{$this->iframeId}?payment_token={$paymentToken}";
        return $paymentLink;
    }
}
