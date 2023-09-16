<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function student()
    {
        return inertia('User/Student', [
            'students' => User::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->where('role', 'student')
                ->paginate(Request::input('perPage') ?? 10)
                ->withQueryString()
                ->through(fn($student) => [
                    'id' => $student->id,
                    'name' => $student->name,
                    'phone' => $student->phone,
                    'email' => $student->email,
                    'photo' => $student->photo,
                    'certificate' => $student->certificate,
                    'active_on' => $student->created_at->format('d M Y'),
                    "show_url" => URL::route('student.show', $student->id),
                ]),

            'filters' => Request::only(['search','perPage']),
            'url'     => URL::route('student.store'),
            // 'can' => [
            //     'createUser' => Auth::user()->can('create', User::class)
            // ]
        ]);
    }
    public function instructor()
    {
        return inertia('User/Instructor', [
            'instructors' => User::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->where('role', 'instructor')
                ->paginate(Request::input('perPage') ?? 10)
                ->withQueryString()
                ->through(fn($instructor) => [
                    'id' => $instructor->id,
                    'name' => $instructor->name,
                    'phone' => $instructor->phone,
                    'email' => $instructor->email,
                    'photo' => $instructor->photo,
                    'active_on' => $instructor->created_at->format('d M Y'),
                ]),

            'filters' => Request::only(['search','perPage'])
            // 'can' => [
            //     'createUser' => Auth::user()->can('create', User::class)
            // ]
        ]);
    }
    public function admin()
    {
        return inertia('User/Admin', [
            'admins' => User::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->where('role', 'admin')
                ->paginate(Request::input('perPage') ?? 10)
                ->withQueryString()
                ->through(fn($admin) => [
                    'id' => $admin->id,
                    'name' => $admin->name,
                    'phone' => $admin->phone,
                    'email' => $admin->email,
                    'photo' => $admin->photo,
                    'active_on' => $admin->created_at->format('d M Y'),
                ]),

            'filters' => Request::only(['search','perPage'])
            // 'can' => [
            //     'createUser' => Auth::user()->can('create', User::class)
            // ]
        ]);
    }
    public function profile()
    {
        return inertia('User/Profile', [
            'user' => Auth::user(),
            // 'can' => [
            //     'createUser' => Auth::user()->can('create', User::class)
            // ]
        ]);
    }
    public function profile_update()
    {
        $user = User::findOrFail(Auth::user()->id);

        $user->name = Request::input('name');
        $user->email = Request::input('email');
        $user->phone = Request::input('phone');
        $user->gender = Request::input('gender');
        $user->married_status = Request::input('married_status');
        $user->about = Request::input('about');
        $user->dob = Request::input('dob');

        if (Request::hasFile('photo')) {
            $user->photo = Request::file('photo')->store('image', 'public');
        }

        $user->save();

        return Redirect::back();
    }
    public function setting()
    {
        return inertia('User/Setting', [
            'user' => Auth::user(),
            // 'can' => [
            //     'createUser' => Auth::user()->can('create', User::class)
            // ]
        ]);
    }
    public function setting_update()
    {
        $user = User::findOrFail(Auth::user()->id);

        $user->zoom_email = Request::input('zoom_email');
        $user->jwt_token = Request::input('jwt_token');

        $user->save();

        return Redirect::back();
    }


    public function showStudent($id){
        return User::findOrFail($id);
    }


    public function storeStudent(Request $request){
        $data = Request::validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'certificate' => 'required',
        ]);

        $url ="";

        if (Request::hasFile('certificate')) {
            $url = Request::file('certificate')->store('image', 'public');
        }
        $data['certificate'] = $url ?? null;
        User::create($data);

        return Redirect::back();

    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
