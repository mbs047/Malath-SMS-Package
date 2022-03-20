<?php

namespace Devhereco\MalathSMS;

use Illuminate\Support\ServiceProvider;

class MalathSmsServiceProvider extends ServiceProvider
{

  public function boot()
  {
      $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
      $this->mergeConfigFrom(__DIR__.'/configs/malathsms.php', 'malathsms');

      $this->publishes([
          __DIR__.'/configs/malathsms.php' => config_path('malathsms.php'),
      ]);
  }

  public function register()
  {
    $this->app->singleton(MalathSMS::class, function () {
      return new MalathSMS();
    });
  }

}
