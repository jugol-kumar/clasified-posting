<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index()
    {
        return inertia('Backend/Category/Index', [
            'categories' => Category::query()
                ->with('childrens')
                ->withCount('childrens')
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('title', 'like', "%{$search}%")
                    ->orWhereHas('childrens', function ($developer) use($search){
                        $developer->where('title', 'like', "%{$search}%");
                    });
                })
                ->latest()
                ->paginate(Request::input('perPage') ?? 10)
                ->withQueryString()
                ->through(fn($category) => [
                    'id' => $category->id,
                    'title' => $category->name,
                    'icon' => $category->icon,
                    'banner' =>$category->banner,
                    'childrens_count' => $category->childrens_count,
                    'top' => $category->top,
                    'type' => $category->type,
                    'created_at' => $category->created_at->diffForHumans(),
                ]),
            'filters' => Request::only(['search','perPage', 'dateRange']),
            'parent_categories' => Category::get(),
            'main_url' => URL::route('category.index')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->all();

        if (Request::hasFile('icon')){
            $icon = Request::file('icon')->store('uploads/all', 'public');
            $data['icon'] = $icon;
        }

        if (Request::hasFile('banner')){
            $banner = Request::file('banner')->store('uploads/all', 'public');
            $data['banner'] = $banner;
        }
        $data['type'] = 'primary';
        $data['status'] = 'published';
        Category::create($data);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return Category
     */
    public function show(Category $category)
    {
        $category->load('childrens');
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return array
     */
    public function update($id)
    {
        $category = Category::findOrFail($id);

        $category->name = Request::input('title');

//        if (Request::hasFile('icon')){
//            $icon = Request::file('icon')->store('uploads/all', 'public');
//            $category->icon = $icon;
//        }
//
//        if (Request::hasFile('banner')){
//            $banner = Request::file('banner')->store('uploads/all', 'public');
//            $category->banner = $banner;
//        }

        $category->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }

    public function makeFeatured($id){
        $category = Category::findOrfail($id);
        if ($category){
            $category->top = !Request::input('isTop');
            $category->update();
        }
        return back();
    }
}
