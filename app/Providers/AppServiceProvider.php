<?php

namespace App\Providers;

use App\Models\User;
use App\Services\CommentService;
use App\Services\CommentServiceInterface;
use App\Services\ReviewService;
use App\Services\ReviewServiceInterface;
use App\Services\UserService;
use App\Services\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CommentServiceInterface::class => CommentService::class,
        ReviewServiceInterface::class => ReviewService::class,
        UserServiceInterface::class => UserService::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
