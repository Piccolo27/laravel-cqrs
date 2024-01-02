<?php

namespace Modules\Post\Repositories;

interface WritePostRepositoryContract
{
    public function create(string $title): int;
}
