<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\District;
use App\Models\Division;
use App\Models\Job;
use App\Models\Post;
use App\Models\SubCategory;
use App\Properties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function home()
    {
        $posts = Post::where('status', 'Approved')->where('position', 'Featured')->take(10)->get();
        return view('frontend.home', compact('posts'));
    }

    public function singleJob($id){
        $post = Post::with(['category', 'sub_category', 'child_category', 'division', 'district', 'upazila'])->findOrFail($id);

        $categoryPosts = Post::where('category_id', $post->category_id)->where('status', 'Approved')->get()->chunk(4);

        return view('frontend.single_job', compact('post', 'categoryPosts'));
    }

    public function allDistrict(Request $request){
        $query = $request->get('data');
        $data = District::where('name','LIKE','%'.$query.'%')->get();
        $output = '<ul class="list-unstyled">';
        foreach($data as $row){
            $output .= '<li>'.$row->name.'</li>';
        }
        $output .= '</ul>';
        echo $output;
    }

    public function getSubCategories($id){
        $categories = SubCategory::where('category_id', $id)->withCount('jobs')->get();
        return $categories;
    }

    public function searchJob(){
        $type = \request()->input('job_type');
        $loc  = \request()->input('loacation');
        $cat  = \request()->input('cat_id');
        $div  = \request()->input('div_id');

        $categories    = Category::withCount('jobs')->get();
        $divisions     = Division::withCount('jobs')->get();
        if ($cat != null){
            $subCategories = SubCategory::where('category_id', $cat)->withCount('jobs')->get();
        }else{
            $subCategories = [];
        }

        $jobs = Post::query()->where('status', 'Approved');
        if ($type != null){
            $jobs = $jobs->Where('title', 'LIKE', "%{$type}%");
        }

        if ($cat != null){
            $jobs->where('category_id', $cat);
        }
        if($loc != null){
            $jobs->where('address', 'LIKE', "%{$type}%");
        }

        $jobs = $jobs->paginate(12)->withQueryString();
        return view('frontend.filter_jobs', compact('jobs', 'categories', 'divisions', 'subCategories'));
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function blog(){
        return view('frontend.blog');
    }

    public function faq()
    {
        return view('faq');
    }

    public function details($slug)
    {
        $course = Course::where('slug', $slug)->first();
        return view('details', compact('course'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function checkout($slug)
    {
        $course = Course::where('slug', $slug)->first();
        return view('checkout', compact('course'));
    }



    // recruiter
    public function recruiter(){
        return view("recruiters.recuriator");
    }


    // seekers
    public function seekers(){
        return view('seekers.seekers');
    }

}
