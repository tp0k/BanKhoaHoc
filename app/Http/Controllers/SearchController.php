<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class SearchController extends Controller
{
    public function search(Request $request)
{
    $keyword = $request->input('keyword');
    $course1 = Course::all();
    if (!empty($keyword)) {
        $course1 = Course::where('title_en', 'like', "%$keyword%")
            ->orWhere('description_en', 'like', "%$keyword%")
            ->get();
    return view('backend.course.courses.index', compact('course1'));
}
}}



