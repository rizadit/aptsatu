<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class RequestKemenkeuID
{
    protected Constant $constant;

    public function __construct(Constant $constant)
    {
        $this->constant = $constant;
    }

    /**
     * Use to Request Code from KemenkeuID Server
     * @return string
     */
    public function requestCode(): string
    {
        return $this->defineEndPoint()
            .$this->constant::AUTHORIZATION_URL
            ."?client_id=".$this->getClientId()
            ."&scope=".$this->constant::SCOPE
            ."&response_type=".$this->constant::RESPONSE_TYPE
            ."&redirect_uri=".$this->getCallBackUri();
    }

    /**
     * Request Bearer Token
     * @param string $code
     * @return mixed
     */
    public function requestBearerToken(string $code): mixed
    {
        if($code === null) exit('Code from Kemenkeu ID cannot have null value');
        try
        {
            $client = new Client(['verify' => false]);
            $response = $client->post($this->defineEndPoint() .  $this->constant::TOKEN_URL,[
                'form_params' => [
                    'client_id'     => $this->getClientId(),
                    'grant_type'    => $this->constant::GRANT_TYPE,
                    'code'          => $code,
                    'redirect_uri'  => $this->getCallBackUri()
                ]
            ]);

            $response = json_decode($response->getBody()->getContents(), true);
            return $response;

        } catch (GuzzleException $exception)
        {
            Log::error('KemenkeuID - Error Request Bearer Token :'.$exception->getMessage());
            return $exception->getMessage();
        }
    }

    /**
     * Get user info with bearer token
     * @param string $bearerToken
     * @return mixed
     */
    public function requestUserInfo(string $bearerToken): mixed
    {
        if ($bearerToken === null) exit('Bearer token cannot have null value');
        try
        {
            $client = new Client(['verify' => false]);
            $headers = [
                'Authorization' => 'Bearer ' . $bearerToken,
                'Accept'        => 'application/json',
            ];

            $response = $client->get($this->constant::SERVICE_DATA_PROFILE_HRIS_URL,[
                'headers' => $headers
            ]);

            return $response->getBody()->getContents();
        }
        catch (GuzzleException $exception)
        {
            Log::error('KemenkeuID - Error Get User Info: '.$exception->getMessage());
            return $exception->getMessage();
        }
    }

    /**
     * Define endpoin$t base by app environment
     * @return string
     */
    private function defineEndPoint(): string
    {
        // if(config('kemenkeu_id.environment') === 'production'){
        //     return $this->constant::PROD_BASE_URL;
        // }
            

        return $this->constant::DEV_BASE_URL;
    }

    /**
     * Get client id value from config
     * @return string
     */
    private function getClientId(): string
    {
        if (config('kemenkeu_id.client_id') === null)
            exit('Client ID cannot have null value');

        return config('kemenkeu_id.client_id');
    }

    /**
     * Get callback uri from config
     * @return string
     */
    private function getCallBackUri(): string
    {
        if (config('kemenkeu_id.url_callback') === null)
            exit('Callback URI cannot have null value');

        return config('kemenkeu_id.url_callback');
    }
}
