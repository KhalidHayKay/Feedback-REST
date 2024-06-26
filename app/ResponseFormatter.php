<?php

declare(strict_types=1);

namespace App;

use Psr\Http\Message\ResponseInterface;

class ResponseFormatter
{
    public function asJson(
        ResponseInterface $response, 
        mixed $data, 
        int $flag = JSON_HEX_AMP | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_THROW_ON_ERROR
    ): ResponseInterface
    {
        $response->getBody()->write(json_encode($data, $flag));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}