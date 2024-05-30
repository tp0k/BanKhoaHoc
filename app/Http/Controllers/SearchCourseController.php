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
    public function search2Course(Request $request) {
        $categoryId = $request->input('course_category_id'); // Lấy ID danh mục từ URL
        $categories = CourseCategory::all(); // Lấy tất cả danh mục để hiển thị trong filter
        $selectedCategories = $request->input('categories', []);
        
        if ($categoryId) {
            $courses = Course::where('course_category_id', $categoryId)->get(); // Lọc theo ID danh mục
        } elseif ($selectedCategories) {
            $courses = Course::whereIn('course_category_id', $selectedCategories)->get();
        } else {
            $courses = Course::all();
        }
        
        return view('frontend.searchCourse', [
            'course' => $courses,
            'category' => $categories,
            'selectedCategories' => $selectedCategories,
            'allCourse' => Course::all()
        ]);
    }
}
