<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Province;
use App\Sector;
use App\Industry;
use App\AskingPrice;
use App\SharesAvailable;
use App\ShareValue;
use App\WorkingSalary;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            $provinces = Province::all();
            $sectors = Sector::all();
            $industries = Industry::all();
            $asking_prices = AskingPrice::all();
            $shares_available = SharesAvailable::all();
            $share_values = ShareValue::all();
            $working_salaries = WorkingSalary::all();
            $view->with(['provinces'=>$provinces,
                        'sectors' => $sectors,
                        'industries' => $industries,
                        'asking_prices' => $asking_prices,
                        'shares_available' => $shares_available,
                        'share_values' => $share_values,
                        'working_salaries' => $working_salaries,
                        ]);
        });
    }
}
