<?php

namespace Modules\Post\Commands;

use App\Bus\Command;

class CreatePostCommand extends Command
{
    public function __construct(
        private readonly string $title,
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }
}
