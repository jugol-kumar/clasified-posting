<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\District;
use App\Models\Division;
use App\Models\Job;
use App\Models\Post;
use App\Models\Skill;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\Upazila;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index()
    {
        return inertia('Backend/Jobs/Jobs', [
            'posts' => Post::query()
                ->with(['user', 'category', 'sub_category', 'child_category' ])
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('title', 'like', "%{$search}%");
                })
                ->paginate(Request::input('perPage') ?? 10)
                ->withQueryString()
                ->through(fn($post) => [
                    $post['formated_date'] = $post->updated_at->diffForHumans(),
                    'post' => $post,
                ]),
            'filters' => Request::only(['search','perPage']),
            'url' => URL::route('posts.index')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function create()
    {
        return inertia('Backend/Jobs/CreateNew', [
            'categories' => Category::select('id', 'name')->get(),
            'sub_categories' => SubCategory::query()->when(Request::input('category_id'), function ($query, $category_id) {
                    $query->where('category_id', $category_id);
                })
                ->select('id', 'name', 'category_id')->get(),
            'divisions' => Division::all(),
            'conditions' => json_decode(get_setting('conditions')) ?? [],
            'child_categories' => ChildCategory::query()
                ->when(Request::input('sub_category_id'), function ($query, $sub_category_id) {
                    $query->where('sub_category_id', $sub_category_id);
                })->select('id', 'name', 'sub_category_id')->get(),
            'subbycat_url' => URL::route('subbycat'),
            'childbysubcat_url' => URL::route('childbysubcat'),
            'create_url' => URL::route('posts.store'),
        ]);
    }


    public function allSubcategory()
    {
        return SubCategory::where('category_id', Request::input('category'))->get();
    }

    public function getDistricts($id){
        return District::where('division_id', $id)->get();
    }

    public function getUpozilas($id){
        return Upazila::where('district_id', $id)->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \never
     */
    public function store()
    {

        $data = Request::validate([
            "title" => 'required',
            "category_id" => 'nullable|integer',
            "sub_category_id" =>  'nullable|integer',
            "child_category_id" => 'nullable|integer',
            "division_id" => 'required',
            "district_id" => 'required',
            "upozila_id" => 'required',
            "condition" => 'nullable',
            "price" => 'nullable',
            "address" => 'nullable',
            "map" => 'nullable',
            "short_details" => 'nullable',
            "full_details" => 'nullable',
        ]);


        $images = Request::file('images');
        $paths = [];
        foreach ($images as $img) {
            $path = $img['file']->store('thumbnails', 'public');
            $paths[] = $path;
        }

        $data['user_id'] = Auth::id();
        $data['images'] = json_encode($paths);

        Post::create($data);
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function show($id)
    {
        $post = Post::findOrFail($id)->load('category');

        return inertia('Backend/Jobs/SinglePost', [
            'post' => $post
        ]);
    }

    public function updateStatus(){
        Post::findOrFail(Request::input('id'))->update([
            'status' => Request::input('status')
        ]);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Post
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
