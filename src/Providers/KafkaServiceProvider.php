<?php
namespace KafaKService\Providers;

use Illuminate\Support\ServiceProvider;

class KafkaServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([            
            __DIR__.'/../src/config/KafKaService.php'=>config_path('./kafka.php'),
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([            
            __DIR__.'/../src/config/KafKaService.php'=>config_path('./kafka.php'),
        ]);
    }
}
