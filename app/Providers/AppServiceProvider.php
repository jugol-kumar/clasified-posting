<?php

namespace App\Providers;

use App\Models\BusinessSetting;
use App\Models\Category;
use App\Models\Country;
use App\Observers\BusinessSettingObserver;
use App\Observers\CategoryObserver;
use App\Observers\CountryObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);
        Category::observe(CategoryObserver::class);
        Country::observe(CountryObserver::class);
        BusinessSetting::observe(BusinessSettingObserver::class);
    }
}
