<?php

namespace App\Http\Controllers\API;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Http\Controllers\Controller;

class DependencyController extends Controller
{
    public function subCategoryByCategory(Request $request)
    {
        return SubCategory::where('category_id', $request->category)->select('id', 'name')->get();
    }
    public function subQuestionByCategory(Request $request)
    {
        return SubCategory::where('category_id', $request->category)->get()->map(fn($sub) => [
            'id' => $sub->id,
            'name' => $sub->name,
            'question' => $sub->questions->count(),
            'take' => 0,
        ]);
    }

    public function childCategoryBySubCategory(Request $request)
    {
        return ChildCategory::where('sub_category_id', $request->subcategory)->select('id', 'name')->get();
    }

    public function childCategoryByQuestionCount(Request $request)
    {
        return ChildCategory::where('child_category_id', $request->childcategory)->questions->count();
    }
}
