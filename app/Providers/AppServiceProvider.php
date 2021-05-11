<?php
namespace App\Providers;

use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends \Illuminate\Support\ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {

        //Schema::defaultstringLength( 256 );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {

        //Schema::defaultstringLength( 256 );
    }
}
