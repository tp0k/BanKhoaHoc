<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;

class SearchCourseController extends Controller
{
    public function index(Request $request)
    {
        $category = CourseCategory::get();
        $selectedCategories = $request->input('categories', []);
        $keywordf = $request->input('keywordf', '');
        $course = Course::where('status', 2)
        ->when($selectedCategories, function ($query) use ($selectedCategories) {
            $query->whereIn('course_category_id', $selectedCategories);
        })
        ->when($keywordf, function ($query) use ($keywordf) {
            $query->Where(function ($subquery) use ($keywordf) { 
            $subquery->where('status', 2)
                ->where('title_en', 'like', "%$keywordf%")
                ->orWhere('description_en', 'like', "%$keywordf%")
                ->orWhereHas('instructor', function ($subquery) use ($keywordf) {
                    $subquery->where('name_en', 'like', "%$keywordf%");
                });
            });
        })
        ->get();
        $allCourse = Course::where('status', 2)->get();

        return view('frontend.searchCourse', compact('course', 'category', 'selectedCategories', 'allCourse'));
    }
}
