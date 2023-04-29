<?php

namespace App\Services;

use HowestSecAndPriv\IotaSignedData\IotaSignedData;

class DltService
{

    public function writeHash(string $hash, string $preImage = null): string
    {
        $iotaSignedData = new IotaSignedData(env('IOTA_API_URL'));

        return $iotaSignedData->writeHash($hash, $preImage);
    }
}
