<?php

namespace App\Http\Controllers\Auth;

use App\Models\Recruiter;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register()
    {
        return inertia('Auth/Register', [
            'url' => URL::route('register')
        ]);
    }

    public function seekerRegister(){
        return view('seekers.register');
    }


    public function store(Request $request)
    {

        $data = Request::validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $data['role'] = 'recruiters';
        $user = User::create($data);
        Auth::login($user);

        return redirect()->route('user.dashboard');
        return redirect()->intended('dashboard');
    }

    public function create(){
        Request::validate([
            'name'           => 'required|string|max:30',
            'email'          => 'required|email|unique:users',
            'phone'          => 'required|max:15|unique:users',
            'company'        => 'required|string',
            'designation'    => 'required',
            'password'       => 'required|min:6',
            'privacy_policy' => 'required'
        ]);

        $user = User::create([
            'name'     => Request::input('name'),
            'email'    => Request::input('email'),
            'phone'    => Request::input('phone'),
            'password' => Request::input('password'),
            'role'     => 'recruiters',
        ]);

        $recruiter = new Recruiter();
        $recruiter->user_id = $user->id;
        $recruiter->company_name = Request::input('company');
        $recruiter->designation = Request::input('designation');
        $recruiter->save();

        Auth::login($user);
        toast('Registration Successfully done...', 'success');
        return redirect()->route('recruiter.dashboard');
    }


    public function registerSeeker(){
        Request::validate([
            'name'           => 'required|string|max:30',
            'email'          => 'required|email|unique:users',
            'phone'          => 'required|max:15|unique:users',
            'password'       => 'required|min:6',
        ]);

        $user = User::create([
            'name'     => Request::input('name'),
            'email'    => Request::input('email'),
            'phone'    => Request::input('phone'),
            'password' => Request::input('password'),
            'role'     => 'seekers',
        ]);

        Auth::login($user);
        toast('Registration Successfully done...', 'success');
        return redirect()->route('seeker.dashboard');
    }



}
