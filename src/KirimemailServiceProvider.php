<?php

namespace Dwijonarko\Kirimemail;
use Illuminate\Support\ServiceProvider;

class KirimemailServiceProvider extends ServiceProvider
{

    public function boot()
    {
        //  dd('boot');
    }

    public function register()
    {
       $this->app->singleton(Kirimemail::class,function(){
           return new Kirimemail();
       });
    }
}
