<?php

namespace Awesome\Foundation\Traits\Requests;

use Illuminate\Support\Arr;
use Illuminate\Http\Response;

trait Decoding
{
    private function decode(Response $response, string $key = null, $default = null)
    {
        if (($decode = $response->decode()) && !$response->hasError($decode)) {
            return Arr::get($decode['content'], $key, $default);
        }

        return value($default);
    }
}
