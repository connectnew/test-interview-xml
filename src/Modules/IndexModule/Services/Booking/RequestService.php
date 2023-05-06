<?php

namespace Versonix\Interview\Modules\IndexModule\Services\Booking;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Versonix\Interview\Services\Logbook\Logservice;
use Versonix\Interview\Main\Param;
use SimpleXMLElement;
use Exception;

class RequestService
{
    public static function make(string $url, string $method = 'GET', array $query = [], ?SimpleXMLElement $body = null)
    {
        $client = new Client(
            [
                'base_uri' => 'http://' . Param::get('app.static_ip'),
            ]
        );

        $options = [
            'query' => $query,
            'headers' => [
                'Content-Type' => 'text/xml',
            ],
            'timeout' => 1800, // seconds
            'read_timeout' => 1800, // seconds
        ];
        if (!empty($body)) {
            $options['body'] = $body->asXML();
        }

        return self::get($client, $method, $url, $options);
    }

    private static function get(Client $client, string $method, string $url, array $options)
    {
        try {

            $response = $client->request($method, $url, $options);

        } catch (GuzzleException $e) {

            $message = $e->getMessage();
            LogService::error($message);

            return [
                'status' => 'error',
                'message' => $message,
            ];
        }

        try {

            $items = simplexml_load_string($response->getBody()->getContents());

        } catch (Exception $e) {

            $message = $e->getMessage();
            LogService::error($message);

            return [
                'status' => 'error',
                'message' => $message,
            ];
        }

        return [
            'status' => 'ok',
            'data' => $items,
        ];
    }
}