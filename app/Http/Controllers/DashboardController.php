<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Job;
use App\Models\User;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use mysql_xdevapi\Exception;
use Opcodes\LogViewer\Facades\LogViewer;

class DashboardController extends Controller
{
    public function admin()
    {
        try {
            return inertia('Backend/Dash',[
                'total_sale' => 0,
                'total_student' => 0
            ]);
        }catch (\Exception $exception){
            Log::alert('DashboardController admin', ['message' => $exception->getMessage()]);
            abort(500, $exception->getMessage());
        }
    }

    public function student()
    {
        return inertia('Backend/Student/Dashboard', [
            'report' =>[
                'total_wishlist_course' => Auth::user()->witchLists->count(),
                'total_transactions'    => Auth::user()->transactions->count(),
                'total_courses'         => Auth::user()->orders->count(),
                'total_subscriptions'   => Auth::user()->subscriptions->count(),
            ]
        ]);
    }

    public function recruiters()
    {
        $rec = new RecruitersController();
        return $rec->allJobs();
    }
}
