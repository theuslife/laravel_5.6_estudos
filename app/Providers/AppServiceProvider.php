<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{

    //Podemos nomear componentes para que fique ainda mais fácil sua utilização
    public function boot()
    {
        Blade::component('components.alertcomponent', 'alert');
    }

    public function register()
    {
        //
    }
}
