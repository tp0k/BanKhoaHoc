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
        $user_id = currentUserId();
        // dd($user_id);
        // Kiểm tra xem học sinh đã đăng ký khoá học hay chưa
        $enrollment = Enrollment::where('student_id', $user_id)
                                ->where('course_id', $course->id)
                                ->first();
        // Lấy ID của category của khóa học hiện tại
        $courseCategoryId = $course->course_category_id;

        // Lấy danh sách các khoá học liên quan dựa trên category của khóa học hiện tại và ID của khóa học hiện tại
        $relatedCourses = $this->relatedCourses($courseCategoryId, $course->id);
        return view('frontend.courseDetails', compact('course', 'enrollment', 'relatedCourses', 'courseCategoryId'));
    }

    public function relatedCourses($courseCategoryId, $currentCourseId)
    {
        // Lấy danh sách các khoá học liên quan dựa trên course_category_id của khóa học đang hiển thị
        $relatedCourses = Course::where('course_category_id', $courseCategoryId)
                                ->where('id', '!=', $currentCourseId) // Loại trừ khóa học đang hiển thị
                                // ->limit(5) // Giới hạn số lượng khóa học liên quan
                                ->get();

        return $relatedCourses;
    }
}
