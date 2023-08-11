<?php

namespace App\Providers;

use App\Http\ViewComposers\AdminNavComposer;
use App\Http\ViewComposers\ContactsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('admin.includes.index.navbar', AdminNavComposer::class);
        View::composer('*', ContactsComposer::class);
    }
}
