<?php

namespace Smony\Personalization;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class PersonalizationProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias(config('personalization.model.interests'), 'interest.model');
        $this->app->alias(config('personalization.model.users_cookies'), 'users_cookies.model');
        $this->app->alias(config('personalization.model.user_histories'), 'user_histories.model');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/personalization.php' => config_path('personalization.php'),
        ], 'config');

        $timeStamp = Carbon::now()->format('Y_m_d_His');

        $interests = database_path("migrations/{$timeStamp}_create_interests_table.php");
        $cookies = database_path("migrations/{$timeStamp}_create_users_cookies_table.php");
        $history = database_path("migrations/{$timeStamp}_create_user_history_table.php");

        $this->publishes([
            __DIR__ . '/../database/migrations/create_interests_table.php.stub' => $interests,
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../database/migrations/create_users_cookies_table.php.stub' => $cookies,
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../database/migrations/create_user_history_table.php.stub' => $history,
        ], 'migrations');
    }
}
