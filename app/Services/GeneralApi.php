<?php

namespace App\Services;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class GeneralApi
{
    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    private function getContent(ResponseInterface $response): string
    {
        return $response->getBody()->getContents();
    }

    /**
     * @param string $uri
     * @param array|null $params
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get(string $uri, array $params = []): string
    {
        $result = $this->client->get($uri, [$params]);
        return $this->getContent($result);
    }
}
