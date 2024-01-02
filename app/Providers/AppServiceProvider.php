<?php

namespace App\Providers;

use App\Bus\CommandBus;
use App\Bus\IlluminateCommandBus;
use App\Bus\IlluminateQueryBus;
use App\Bus\QueryBus;
use Illuminate\Support\ServiceProvider;
use Modules\Ai\Client\AiClient;
use Modules\Ai\Client\OpenAiClient;
use Modules\Post\Commands\CreatePostCommand;
use Modules\Post\Commands\CreatePostCommandHandler;
use Modules\Post\Repositories\ReadPostRepository;
use Modules\Post\Repositories\ReadPostRepositoryContract;
use Modules\Post\Repositories\WritePostRepository;
use Modules\Post\Repositories\WritePostRepositoryContract;
use Modules\User\Repositories\ReadUserRepository;
use Modules\User\Repositories\ReadUserRepositoryContract;
use Modules\User\Repositories\WriteUserRepository;
use Modules\User\Repositories\WriteUserRepositoryContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $singletons = [
            CommandBus::class => IlluminateCommandBus::class,
            //QueryBus::class => IlluminateQueryBus::class,

            WritePostRepositoryContract::class => WritePostRepository::class,
            ReadPostRepositoryContract::class => ReadPostRepository::class,
        ];

        foreach ($singletons as $abstract => $concrete) {
            $this->app->singleton(
                $abstract,
                $concrete,
            );
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $commandBus = app(CommandBus::class);
        $commandBus->register([
            CreatePostCommand::class => CreatePostCommandHandler::class,
        ]);
    }
}
