<?php

namespace AllDigitalRewards\CarrierTracking\CarrierRequest;

use AllDigitalRewards\CarrierTracking\CarrierResponse\AbstractCarrierResponse;
use JsonSerializable;

abstract class AbstractApiRequest  implements JsonSerializable
{
    protected string $trackingNumber = '';
    protected array $headers = [];
    protected string $httpEndpoint = '';
    protected string $queryParams = '';

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function getHttpEndpoint(): string
    {
        return $this->httpEndpoint;
    }

    public function setHttpEndpoint(string $httpEndpoint): void
    {
        $this->httpEndpoint = $httpEndpoint;
    }

    public function getQueryParams(): string
    {
        return $this->queryParams;
    }

    public function setQueryParams(string $queryParams): void
    {
        $this->queryParams = $queryParams;
    }

    abstract public function getResponseObject(): AbstractCarrierResponse;
}
