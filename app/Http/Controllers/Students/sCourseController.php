<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class sCourseController extends Controller
{
    public function Show(Request $request, $id)
    {
        $course = Course::findOrFail(encryptor('decrypt', $id));
        $relatedCourses = $this->relatedCourses($course->course_category_id);// Lấy danh sách khoá học liên quan
        $user_id = currentUserId();
        // dd($user_id);
        // Kiểm tra xem học sinh đã đăng ký khoá học hay chưa
        $enrollment = Enrollment::where('student_id', $user_id)
                                ->where('course_id', $course->id)
                                ->first();
        
        return view('frontend.courseDetails', compact('course', 'enrollment', 'relatedCourses'));
    }

    public function relatedCourses($courseCategoryId)
    {
        // Lấy danh sách các khoá học liên quan dựa trên course_category_id của khóa học đang hiển thị
        $relatedCourses = Course::where('course_category_id', $courseCategoryId)
                                // ->where('id', '!=', $this->course->id) // Loại trừ khoá học đang hiển thị
                                ->limit(5) // Giới hạn số lượng khoá học liên quan
                                ->get();
        // dd($relatedCourses);
        return $relatedCourses;
    }
}
