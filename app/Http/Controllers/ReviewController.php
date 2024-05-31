<?php

namespace App\Http\Controllers;
use App\Models\Review;
use App\Models\Course;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'rating' => 'required',
        'course_id' => 'required',
    ]);
    $review = new Review;
    $review->rating = $request->rating;
    $review->student_id = session('id');
    $review->course_id = $request->course_id;
    $review->created_at = now();
    $review->save();

    return back()->with('success', 'Đánh giá của bạn đã được lưu thành công!');
}
}
