<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TestingServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO remove this serviceprovider if bug is fixed
        if ($this->app->environment() == 'testing') {
            $this->app['config']['session.driver'] = 'native';
        }
    }

}