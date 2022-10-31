<?php

namespace Awesome\Foundation\Traits\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory as MainTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait HasFactory
{
    use MainTrait;

    public static function createEntity(array $data = []): ?Model
    {
        if (!static::factory()) {
            return null;
        }

        return static::factory()->create($data);
    }

    public static function createActiveEntity(): ?Model
    {
        return static::createEntity(['is_active' => true]);
    }

    public static function createActiveList(int $count): Collection
    {
        return static::createList($count, ['is_active' => true]);
    }

    public static function createList(int $count, array $data = []): Collection
    {
        if (!static::factory()) {
            return collect();
        }

        return static::factory()->count($count)->create($data);
    }

    public static function createCustomList(array $data): Collection
    {
        if (!static::factory()) {
            return collect();
        }

        return static::factory()->createMany($data);
    }
}
