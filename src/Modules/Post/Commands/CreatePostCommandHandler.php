<?php

namespace Modules\Post\Commands;

use App\Bus\CommandHandler;
use Modules\Post\Repositories\WritePostRepository;

class CreatePostCommandHandler extends CommandHandler
{
    public function __construct(
        protected WritePostRepository $repository
    )
    {}

    public function handle(CreatePostCommand $command): int
    {
        return 0;
//        return $this->repository->create($command->title);
    }
}
