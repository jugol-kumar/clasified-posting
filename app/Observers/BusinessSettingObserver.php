<?php

namespace App\Observers;

use App\Models\BusinessSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class BusinessSettingObserver
{
    /**
     * Handle the BusinessSetting "created" event.
     *
     * @param  \App\Models\BusinessSetting  $businessSetting
     * @return void
     */
    public function created(BusinessSetting $businessSetting)
    {

        Log::info('BusinessSetting', [
            'message' => 'Cache Forget Create Operation',
            'time' => now()
        ]);

        Cache::forget('countries');
    }

    /**
     * Handle the BusinessSetting "updated" event.
     *
     * @param  \App\Models\BusinessSetting  $businessSetting
     * @return void
     */
    public function updated(BusinessSetting $businessSetting)
    {
        //
    }

    /**
     * Handle the BusinessSetting "deleted" event.
     *
     * @param  \App\Models\BusinessSetting  $businessSetting
     * @return void
     */
    public function deleted(BusinessSetting $businessSetting)
    {
        //
    }

    /**
     * Handle the BusinessSetting "restored" event.
     *
     * @param  \App\Models\BusinessSetting  $businessSetting
     * @return void
     */
    public function restored(BusinessSetting $businessSetting)
    {
        //
    }

    /**
     * Handle the BusinessSetting "force deleted" event.
     *
     * @param  \App\Models\BusinessSetting  $businessSetting
     * @return void
     */
    public function forceDeleted(BusinessSetting $businessSetting)
    {
        //
    }
}
