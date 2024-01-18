<?php

namespace AllDigitalRewards\CarrierTracking\tests;

use AllDigitalRewards\CarrierTracking\Services\CarrierDiscovery;
use PHPUnit\Framework\TestCase;

class CarrierDetectionTest extends TestCase
{
    public function testCarrierDetection()
    {
        $this->assertSame('DHL', (new CarrierDiscovery('1469000023'))->detectCarrier());
        $this->assertSame('UPS', (new CarrierDiscovery('1Z999AA10123456784'))->detectCarrier());
        $this->assertSame('USPS', (new CarrierDiscovery('9400 1000 0000 0000 0000 00'))->detectCarrier());
        $this->assertSame('USPS', (new CarrierDiscovery('9274899991099835941441'))->detectCarrier());
        $this->assertSame('FedEx', (new CarrierDiscovery('780371515850'))->detectCarrier());
        $this->assertSame('FedEx', (new CarrierDiscovery('425524462818'))->detectCarrier());
        $this->assertSame('FedEx', (new CarrierDiscovery('74890983235120791126'))->detectCarrier());
        $this->assertSame('FedEx', (new CarrierDiscovery('61299995671266910991'))->detectCarrier());
        $this->assertSame('FedEx', (new CarrierDiscovery('61290983300023480447'))->detectCarrier());
        $this->assertSame('FedEx', (new CarrierDiscovery('61290983235120607902'))->detectCarrier());
        $this->assertSame('FedEx', (new CarrierDiscovery('74890983235120791126'))->detectCarrier());
        $this->assertSame('FedEx', (new CarrierDiscovery('61290983300023492518'))->detectCarrier());
    }
}
