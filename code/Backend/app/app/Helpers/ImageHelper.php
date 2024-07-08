<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class ImageHelper
{
    public static function fetchImage($query)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.unsplash.com/search/photos', [
            'query' => [
                'query' => $query,
                'client_id' => "Kwjmh0ctNA1QQWN75nzL_C36iao8oHWnkfhacVwXcR4",
                'per_page' => 1
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        return $data['results'][0]['urls']['small'] ?? null;
    }
}

