<?php

namespace AllDigitalRewards\CarrierTracking\CarrierRequest;

use AllDigitalRewards\CarrierTracking\CarrierResponse\AbstractCarrierResponse;
use AllDigitalRewards\CarrierTracking\CarrierResponse\DhlResponse;

class DhlTrackingRequest extends AbstractApiRequest
{
    public function __construct(string $trackingNumber, string $apiKey)
    {
        $this->trackingNumber = $trackingNumber;
        $this->setHttpEndpoint("https://api-eu.dhl.com/track/shipments");
        $this->setHeaders([
            'Accept' => 'application/json',
            'DHL-API-Key' => $apiKey,
        ]);
    }

    public function getQueryParams(): string
    {
        return "trackingNumber={$this->trackingNumber}";
    }

    public function getResponseObject(): AbstractCarrierResponse
    {
        return new DhlResponse();
    }

    public function jsonSerialize(): array
    {
        return [];
    }
}
