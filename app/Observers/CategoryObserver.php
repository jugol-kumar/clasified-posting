<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        Log::info('Category forget', [
            'message' => 'Update Successfully Done...!',
            'time' => now()
        ]);

        Cache::forget('categories');
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        Log::info('Category forget', [
            'message' => 'Category Update Successfully Done...!',
            'time' => now()
        ]);

        Cache::forget('categories');
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        Log::info('Category forget', [
            'message' => 'Update Successfully Done...!',
            'time' => now()
        ]);

        Cache::forget('categories');
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        Log::info('Category forget', [
            'message' => 'Update Successfully Done...!',
            'time' => now()
        ]);

        Cache::forget('categories');
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        Log::info('Category forget', [
            'message' => 'Update Successfully Done...!',
            'time' => now()
        ]);

        Cache::forget('categories');
    }
}
