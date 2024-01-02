<?php

namespace Modules\Post\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Post\Repositories\ReadPostRepositoryContract;

class ReadPostRepository implements ReadPostRepositoryContract
{

    public function find(int $id): ?object
    {
        return DB::table('posts')->where('id', $id)->first();
    }
}
