<?php

namespace App\Http\Controllers;

use App\Bus\CommandBus;
use Illuminate\Http\Request;
use Modules\Post\Commands\CreatePostCommand;

class PostController extends Controller
{
    public function __construct(protected CommandBus $bus)
    {
    }

    public function index()
    {
        return view('posts.index');
    }

    public function gotoCreate()
    {
        return view('posts.create');
    }

    public function create(Request $request)
    {
        $id = $this->bus->dispatch(
            new CreatePostCommand(
                title: $request->title,
            ),
        );

        return redirect()->route('posts.index');
    }
}
