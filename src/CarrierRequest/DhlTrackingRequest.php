<?php

namespace AllDigitalRewards\CarrierTracking\CarrierRequest;

use AllDigitalRewards\CarrierTracking\CarrierResponse\AbstractCarrierResponse;
use AllDigitalRewards\CarrierTracking\CarrierResponse\DhlResponse;

class DhlTrackingRequest extends AbstractApiRequest
{
    public function __construct(string $trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;
        $this->setHttpEndpoint("https://api-eu.dhl.com/track/shipments?");
        $this->setHeaders([
            'Accept' => 'application/json',
            'DHL-API-Key' => getenv('DHL_API_KEY'),
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
}
