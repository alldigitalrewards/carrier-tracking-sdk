<?php

namespace AllDigitalRewards\CarrierTracking\CarrierResponse;

use JsonSerializable;

class DhlResponse extends AbstractCarrierResponse implements JsonSerializable
{
    private string|null $status = null;

    public function hydrate($data): void
    {
        if (isset($data['shipments'][0]['status'])) {
            $this->status = $data['shipments'][0]['status']['status'];
        }
    }

    public function jsonSerialize(): array
    {
        return [
            'status' => $this->status,
        ];
    }
}
