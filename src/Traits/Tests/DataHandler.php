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
        array        $structure = [],
        int          $count = null,
        string       $key = null
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

    private function checkErrorAssert(
        TestResponse $response,
        string       $errorCode = null,
        array        $structure = []
    ): void
    {
        if (empty($structure)) {
            $structure = $this->getDefaultErrorStructure();
        }

        $this->checkAssert($response, $structure);

        if (!is_null($errorCode)) {
            $response->assertJson([
                'error' => 1,
                'content' => [
                    'error_code' => $errorCode
                ]
            ]);
        }
    }

    private function checkSuccessAssert(TestResponse $response): void
    {
        $this->checkAssert($response, $this->getDefaultSuccessStructure());

        $response->assertJson([
            'error' => 0,
            'content' => [
                'success' => true
            ]
        ]);
    }

    private function getDefaultSuccessStructure(): array
    {
        return [
            'error',
            'content' => [
                'success'
            ]
        ];
    }

    private function getDefaultErrorStructure(): array
    {
        return [
            'error',
            'content' => [
                'error_code',
                'error_message',
                'error_data'
            ]
        ];
    }
}
