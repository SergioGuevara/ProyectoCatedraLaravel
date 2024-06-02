<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('after_start_date', function ($attribute, $value, $parameters, $validator) {
            $start_date = Carbon::parse($validator->getData()['start_date']);
            $end_date = Carbon::parse($value);
            return $end_date->greaterThan($start_date);
        });

        Validator::extend('cupon_menor_precio_normal', function ($attribute, $value, $parameters, $validator) {
            $precioNormal = $validator->getData()[$parameters[0]];
            return $value < $precioNormal;
        });

        Validator::extend('oferta_menor_precio_normal', function ($attribute, $value, $parameters, $validator) {
            $precioNormal = $validator->getData()[$parameters[0]];
            return $value < $precioNormal;
        });

        Validator::extend('cupon_menor_precio_oferta', function ($attribute, $value, $parameters, $validator) {
            $precioNormal = $validator->getData()[$parameters[0]];
            return $value < $precioNormal;
        });
    }
}
