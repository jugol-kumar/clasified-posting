<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(){
        return inertia('Auth/Forgot', [
            'url' => URL::route('login')
        ]);
    }

    public function sendForgotPasswordReqs(){
        $user = User::where('email', Request::input('email'))->first();
        if($user != null){
            $verificaiton = new VerificationController();
            $status = $verificaiton->refendEmail($user->email, true);
            if($status){
                return inertia('Auth/Forgot', [
                    'success' => "Resend Password Mail Send Successfully Done !"
                ]);
            }else{
                return inertia('Auth/Forgot', [
                    'error' => "Have an error, Please try again later!"
                ]);
            }
        }else{
            return inertia('Auth/Forgot', [
               'error' => "Your Email Address Not Valid...!"
            ]);
        }

    }

    public function createNewPasswordForm(){
        return inertia('Auth/Resend', [
            'email' =>  base64_decode(Request::input('token'))
        ]);
    }

    public function saveNewPassword(){
        Request::validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('email', Request::input('email'))->first();

        $user->update([
            'password' =>Request::input('password')
        ]);

        return redirect('/login');
    }

}
