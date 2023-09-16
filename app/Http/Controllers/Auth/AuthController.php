<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:instructor');
    }

    public function login()
    {
        return inertia('Auth/Login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    
    public function admin_login()
    {
        return inertia('Auth/Login', [
            'url' => URL::route('admin.login')
        ]);
    }

    public function admin_authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function instructor_login()
    {
        return inertia('Instructor/Auth/Login', [
            'url' => URL::route('instructor.login')
        ]);
    }

    public function instructor_authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('instructor')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('instructor/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function student_login()
    {
        return inertia('Student/Auth/Login', [
            'url' => URL::route('login')
        ]);
    }

    public function student_authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|string|min:8',
        ]);

        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            }
        }

        if (Auth::attempt(['phone' => $request->username, 'password' => $request->password], $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function student_signup()
    {
        return inertia('Student/Auth/Register', [
            'url' => URL::route('signup')
        ]);
    }


    public function student_store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $student = User::create($data);

        Auth::login($student);

        return redirect()->intended('dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        Auth::guard('instructor')->logout();
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
