<?php

declare(strict_types=1);

namespace App\Repository;

final class SomeFakeRepository implements SomeRepositoryInterface
{
    public function save(...$whatever): bool
    {
        sleep(1); // do some hard work

        return (bool)random_int(0, 1);
    }
}
