<?php

namespace Awesome\Foundation\Traits\Tests;

use Illuminate\Testing\TestResponse;

trait DataHandler
{
    private function createCustomData(int $count, array $data): array
    {
        $res = [];
        do {
            $el = [];

            foreach ($data as $k => $v) {
                $el[$k] = $v->random()->id;
            }

            $res[] = $el;
        } while (count($res) < $count);

        return $res;
    }

    private function checkAssert(
        TestResponse $response,
        array $structure = [],
        int $count = null,
        string $key = null
    ): void
    {
        $response->assertOk();

        if (!empty($structure)) {
            $response->assertJsonStructure($structure);
        }

        if (!is_null($count)) {
            $response->assertJsonCount($count, $key);
        }
    }
}
