<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Division;
use App\Models\EducationLabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function verification(){
        return view('auth.verification');
    }

    public function verificationCheckOtp(Request $request){
        $request->validate([
            'otp.*' => 'required'
        ],[
            'otp.*.required' => "Please Fill-Up OTP Form With Valid OTP Code"
        ]);

        $otp = trim(implode("", $request->input("otp")));
        $user = Auth::user();
        if ($otp){
            if($user->sms_otp != null && $user->sms_otp == $otp){
                $user->update([
                    'sms_otp' => null,
                    'is_verified' => true,
                    'email_verified_at' => now()
                ]);
                toast('Your Phone Number Is Verified Now.', 'success');

                if (Auth::user()->role == "admin") {
                    return redirect()->route('admin.dashboard');
                } elseif (Auth::user()->role == "recruiters") {
                    return redirect()->route('recruiter.dashboard');
                } else {
                    return redirect()->route('seeker.dashboard');
                }
            }else{
                toast('OTP Code is invalid, Try Again', 'error');
                return back();
            }
        }else{
            toast('Please provide valid OTP code', 'error');
            return back();
        }
    }

    public function resVCode(){
        $phone = base64_decode(\request()->input('phone'));
        sendOtpUser($phone);
        toast('Again Sms Send Successfully Done....', 'success');
        return back();
    }

}
