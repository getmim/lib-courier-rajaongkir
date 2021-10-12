<?php
/**
 * RajaOngkir
 * @package lib-courier-rajaongkir
 * @version 0.0.1
 */

namespace LibCourierRajaongkir\Library;

use LibCurl\Library\Curl;

class RajaOngkir
    implements 
        \LibCourier\Iface\Handler
{

    protected static $lastError;

    protected static function exec($path, $body)
    {
        $config = \Mim::$app->config->libCourierRajaOngkir;
        $package = $config->package;
        $app_key = $config->apikey;

        $url = 'https://' . $package . '.rajaongkir.com/api';

        $opts = [
            'url' => $url . $path,
            'method' => 'POST',
            'headers' => [
                'Accept' => 'application/json',
                'key' => $app_key
            ],
            'body' => $body,
            'agent' => 'lib-courier-rajaongkir'
        ];

        return Curl::fetch($opts);
    }

    protected static function setError(string $error)
    {
        self::$lastError = $error;
        return null;
    }

    static function cost(array $data): ?array {
        return self::setError('Feature in under development');
    }

    static function track(string $courier, string $courier_receipt): ?array {
        $result = self::exec('/waybill', [
            'waybill' => $courier_receipt,
            'courier' => $courier
        ]);

        if (!$result) {
            return self::setError('Unable to reach RajaOngkir API server');
        }

        $result = $result->rajaongkir;
        if ($result->status->code != '200') {
            return self::setError($result->status->description);
        }

        $result = $result->result;

        $tracks = [];

        $status_maps = [
            1 => 2,
            2 => 3,
            3 => 4,
            200 => 2,
            255 => 6,
            480 => 5
        ];
        foreach ($result->manifest as $manifest) {
            $info = '';
            $status = $status_maps[$manifest->manifest_code] ?? 1;

            if ($status == 4) {
                $info = $result->summary->receiver_name;
            }

            $track = [
                'desc'   => $manifest->manifest_description,
                'date'   => $manifest->manifest_date . ' ' . $manifest->manifest_time,
                'note'   => $manifest->city_name,
                'status' => $status,
                'info'   => $info,
                '_manifest' => $manifest
            ];
            $tracks[] = $track;
        }

        return $tracks;
    }

    static function lastError(): ?string {
        return self::$lastError;
    }
}
