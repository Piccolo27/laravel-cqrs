<?php

namespace Modules\Post\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Post\Repositories\WritePostRepositoryContract;

class WritePostRepository implements WritePostRepositoryContract
{

    public function create(string $title): int
    {
        return DB::table('posts')->insertGetId([
            'title' => $title,
        ]);
    }
}
