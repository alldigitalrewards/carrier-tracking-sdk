<?php

namespace AllDigitalRewards\CarrierTracking\Services;

readonly class CarrierDiscovery
{

    public function __construct(private readonly string $trackingNumber)
    {
    }

    public function detectCarrier(): ?string
    {
        // Remove any spaces and convert to uppercase
        $trackingNumber = strtoupper(str_replace(' ', '', $this->trackingNumber));

        // UPS tracking numbers (1Z...)
        if (preg_match('/^1Z[0-9A-Z]{16}$/i', $trackingNumber)) {
            return 'UPS';
        }

        // USPS tracking numbers (various formats)
        if (preg_match('/^(94|93|92|94|95)[0-9]{20}$/', $trackingNumber) ||
            preg_match('/^(70|14|23|03)[0-9]{14}$/', $trackingNumber) ||
            preg_match('/^([A-Z]{2})[0-9]{9}([A-Z]{2})$/', $trackingNumber)) {
            return 'USPS';
        }

        // FedEx tracking numbers (12, 15, or 20 digits)
        if (preg_match('/^[0-9]{12}$/', $trackingNumber) ||
            preg_match('/^[0-9]{15}$/', $trackingNumber) ||
            preg_match('/^[0-9]{20}$/', $trackingNumber)) {
            return 'FedEx';
        }

        // DHL tracking numbers (10 digits)
        if (preg_match('/^[0-9]{10}$/', $trackingNumber)) {
            return 'DHL';
        }

        return null;
    }
}
