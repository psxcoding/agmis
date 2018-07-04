<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ItemService;
use App\Repositories\ItemRepository;

class ItemServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ItemService', function ($app) {
            return new ItemService(new ItemRepository);
        });
    }
}
