<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use const http\Client\Curl\AUTH_ANY;

class RecruitersMidlleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if (Auth::check() && $user->role == 'recruiters'){
//            if($user->getRecProfileComplete() < 50)
//            {
//                return redirect()->route('recruiter.makeProfile');
//            }
//            elseif($user->getRectorVerificationFiles())
//            {
//                return redirect()->route('recruiter.uploadBusinessFile');
//            }
//            elseif($user->beforeVerify())
//            {
//                return redirect()->route('recruiter.showBeforeVerify');
//            }
//            elseif ($user->cancelVerify())
//            {
//                return redirect()->route('recruiter.cancelVerifyRequest');
//            }
//            elseif(!$user->is_active)
//            {
//                return redirect()->route('recruiter.profileInactive');
//            }
//            elseif($user->waitForVerify())
//            {
//                return redirect()->route('recruiter.waitForVerify');
//            }
            return $next($request);
        }
        toast('Sorry ! Your not recruiters. please login your account...', 'error');
        return back();

    }
}
