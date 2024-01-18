<?php

require __DIR__ . '/../vendor/autoload.php';

use AllDigitalRewards\CarrierTracking\CarrierRequest\DhlTrackingRequest;
use AllDigitalRewards\CarrierTracking;
use GuzzleHttp\Exception\GuzzleException;

$client = new CarrierTracking\Client();
$request = new DhlTrackingRequest('121221324', 'DHL_API_KEY');
try {
    $response = $client->request($request);
    print_r($response);
    exit();
} catch (GuzzleException|Exception $e) {
    print_r($e->getMessage());
}
