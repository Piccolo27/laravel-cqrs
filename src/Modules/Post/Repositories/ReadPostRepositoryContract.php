<?php

namespace Modules\Post\Repositories;

interface ReadPostRepositoryContract
{
    public function find(int $id): ?object;
}
