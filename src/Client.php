<?php

namespace AllDigitalRewards\CarrierTracking;

use AllDigitalRewards\CarrierTracking\CarrierRequest\AbstractApiRequest;
use AllDigitalRewards\CarrierTracking\CarrierResponse\AbstractCarrierResponse;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Uri;

class Client
{
    private Uri $uri;
    private \GuzzleHttp\Client $httpClient;

    public function getUri(string $url): Uri
    {
        if (!isset($this->uri)) {
            $this->uri = new Uri($url);
        }
        return $this->uri;
    }

    public function setUri(Uri $uri): void
    {
        $this->uri = $uri;
    }

    public function getHttpClient(): \GuzzleHttp\Client
    {
        if (!isset($this->httpClient)) {
            $this->httpClient = new \GuzzleHttp\Client();
        }
        return $this->httpClient;
    }

    public function setHttpClient(\GuzzleHttp\Client $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @throws GuzzleException
     */
    public function request(AbstractApiRequest $apiRequest): AbstractCarrierResponse
    {
        $httpResponse = $this->getHttpClient()->request(
                'GET',
                $this->getUri($apiRequest->getHttpEndpoint())
                    ->withQuery($apiRequest->getQueryParams())->__toString(),
                [
                    'headers' => $apiRequest->getHeaders(),
                ]
        );

        return $apiRequest->getResponseObject()
            ->hydrate(json_decode($httpResponse->getBody(), true));
    }
}
