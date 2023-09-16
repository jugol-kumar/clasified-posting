<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Inertia\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request),
            [
            'auth' => Auth::user() ? [
                'user' => [
                    'username' => Auth::user()->name,
                    'role' => Auth::user()->role,
                    'photo' => Auth::user()->photo ?? '/images/avatar.png',
                ]
            ] : null,

            'ADMIN_URL' => 'http://127.0.0.1:8000/panel/admin',
            'MAIN_URL' => config('app.url'),
            'appName' => config('app.name'),
            'logo' => Storage::url(get_setting('header_logo'))
        ]);
    }
}
