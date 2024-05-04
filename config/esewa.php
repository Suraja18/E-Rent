<?php

return [
    'access_type' => env('ESEWA_ACCESS_TYPE', 'Test'),
    'website_url' => env('WEBSITE_URL'),
    'secret_key' => env('ESEWA_MERCHANT_ID', '8gBm/:&EnhH.1/q'),
    'prod_code' => env('ESEWA_PROD_CODE', 'EPAYTEST'),
    'test_esewa_url' => 'https://rc-epay.esewa.com.np/api/epay/main/v2/form',
    'live_esewa_url' => 'https://esewa.com.np/epay/main/?',
];