<?php

namespace Devhereco\MalathSMS;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
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
