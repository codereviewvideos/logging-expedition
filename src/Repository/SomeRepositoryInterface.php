<?php

namespace App\Repository;

interface SomeRepositoryInterface
{
    /**
     * @param mixed ...$whatever
     *
     * @return bool
     */
    public function save(...$whatever): bool;
}
