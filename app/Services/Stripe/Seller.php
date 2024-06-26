<?php

namespace App\Services\Stripe;

use GuzzleHttp\Client;

class Seller
{
    public static function create($code)
    {
        $client = new Client([
            'base_uri' => 'https://connect.stripe.com/oauth/',
        ]);
        $request = $client->request('POST', 'token', [
            'form_params' => [
                'client_secret' => config('services.stripe.secret'),
                'code' => $code,
                'grant_type' => 'authorization_code',
            ],
        ]);
        return json_decode($request->getBody()->getContents());
    }
}
