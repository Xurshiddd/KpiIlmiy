<?php

namespace App\Services;
use League\OAuth2\Client\Provider\GenericProvider;
class HemisOAuthClientService
{
    /**
     * Create a new class instance.
     */
    private $provider;

    public function __construct()
    {
        $this->provider = new GenericProvider([
            'clientId'                => config('services.hemis.client_id'),
            'clientSecret'            => config('services.hemis.client_secret'),
            'redirectUri'             => config('services.hemis.redirect'),
            'urlAuthorize'            => config('services.hemis.url_authorize'),
            'urlAccessToken'          => config('services.hemis.url_token'),
            'urlResourceOwnerDetails' => config('services.hemis.url_resource'),
        ]);
    }

    public function provider()
    {
        return $this->provider;
    }
}
