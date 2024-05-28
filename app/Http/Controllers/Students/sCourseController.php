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
        
        return view('frontend.courseDetails', compact('course', 'enrollment'));
    }

}
