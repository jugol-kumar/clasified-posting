<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

class ChildCategoryController extends Controller
{

    public function index()
    {




        return inertia('Backend/ChildCategory/Index', [
            'child_categories' => ChildCategory::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(Request::input('perPage') ?? 10)
                ->withQueryString()
                ->through(fn($child_category) => [
                    'id' => $child_category->id,
                    'title' => $child_category->name,
                    'created_at' => $child_category->created_at->diffForHumans(),
                ]),

            'filters' => Request::only(['search','perPage']),
            'categories' => Category::select('id','name')->get(),
            'sub_categories' => SubCategory::query()
            ->when(Request::input('category_id'), function ($query, $category_id) {
                $query->where('category_id', $category_id);
            })
            ->select('id','name','category_id')->get(),
            'main_url' => URL::route('child-category.index')
        ]);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        ChildCategory::create(
            Request::validate([
                'name' => 'required|max:50',
                'category_id' => 'required',
                'sub_category_id' => 'required',
            ])
        );

        return Redirect::route('child-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChildCategory  $childCategory
     * @return ChildCategory
     */
    public function show(ChildCategory $childCategory)
    {
        $subCat = SubCategory::where('id', 1)->first();

        return $subCat;

        $childCategory->load(['category', 'subCategory']);
        $childCategory->sub_category = $subCat;
        return $childCategory;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChildCategory  $childCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ChildCategory $childCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChildCategory  $childCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChildCategory $childCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChildCategory  $childCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildCategory $childCategory)
    {
        $childCategory->delete();

        return Redirect::route('child_categories.index');
    }
}
