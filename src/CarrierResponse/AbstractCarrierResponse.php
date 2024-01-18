<?php

namespace AllDigitalRewards\CarrierTracking\CarrierResponse;

abstract class AbstractCarrierResponse
{
    abstract public function hydrate($data);
}
