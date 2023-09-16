<?php

namespace App\Observers;

use App\Models\Country;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CountryObserver
{
    /**
     * Handle the Country "created" event.
     *
     * @param  \App\Models\Country  $country
     * @return void
     */
    public function created(Country $country)
    {
        Log::info('Country', [
            'message' => 'Cache Forget Create Operation',
            'time' => now()
        ]);

        Cache::forget('countries');
    }

    /**
     * Handle the Country "updated" event.
     *
     * @param  \App\Models\Country  $country
     * @return void
     */
    public function updated(Country $country)
    {
        Log::info('Country', [
            'message' => 'Cache Forget Update Operation',
            'time' => now()
        ]);

        Cache::forget('countries');
    }

    /**
     * Handle the Country "deleted" event.
     *
     * @param  \App\Models\Country  $country
     * @return void
     */
    public function deleted(Country $country)
    {
        Log::info('Country', [
            'message' => 'Cache Forget Delete Operation',
            'time' => now()
        ]);

        Cache::forget('countries');
    }

    /**
     * Handle the Country "restored" event.
     *
     * @param  \App\Models\Country  $country
     * @return void
     */
    public function restored(Country $country)
    {
        Log::info('Country', [
            'message' => 'Cache Forget Restored Operation',
            'time' => now()
        ]);

        Cache::forget('countries');
    }

    /**
     * Handle the Country "force deleted" event.
     *
     * @param  \App\Models\Country  $country
     * @return void
     */
    public function forceDeleted(Country $country)
    {
        Log::info('Country', [
            'message' => 'Cache Forget Restored Operation',
            'time' => now()
        ]);
        Cache::forget('countries');
    }
}
