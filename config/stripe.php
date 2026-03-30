<?php

return [
    'publishable' => env('STRIPE_PUB_KEY'),
    'secret' => env('STRIPE_SECRET_KEY'),
    'web_secret' => env('STRIPE_WEBHOOK_SECRET')
];