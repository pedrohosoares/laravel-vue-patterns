<?php

namespace App\Providers;

use App\Blog\Repositories\CategoryRepository;
use App\Blog\Repositories\PostRepository;
use App\Blog\Services\PostService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
