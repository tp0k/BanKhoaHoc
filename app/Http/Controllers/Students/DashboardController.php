<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Enrollment;
use App\Models\Course;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Models\Vpayment;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $studentId = session('id');
        $vpayments = VPayment::where('user_id', currentUserId())->orderBy('p_time', 'desc')->get();
        $student_info = Student::find(currentUserId());
        $enrollment = Enrollment::where('student_id', currentUserId())->get();
        $courses = Course::get();
        $checkout = Checkout::where('student_id', currentUserId())->get();
    
        $completedCourses = collect();
        $incompleteCourses = collect();
        foreach ($courses as $course) {
            // Đếm số bài giảng video đã hoàn thành
            $completedVideoCount = DB::table('watchlists')
                ->where('student_id', $studentId)
                ->where('course_id', $course->id)
                ->count();
            // Đếm tổng số bài giảng video trong khóa học
            $CountVideo = DB::table('materials')
            ->join('lessons', 'materials.lesson_id', '=', 'lessons.id')
            ->where('lessons.course_id', $course->id)
            ->count();


            if ($CountVideo > 0) {
                $completionPercentage = ($completedVideoCount / $CountVideo) * 100;
                
                if ($completionPercentage == 100) {
                    $completedCourses[] = $course;
                } else {
                    $course->completionPercentage = $completionPercentage;
                    $incompleteCourses[] = $course;
                }
            } else {
                $course->completionPercentage = 0;
                $incompleteCourses[] = $course;
            }
        }

        return view('students.dashboard', compact('student_info', 'enrollment', 'course', 'checkout', 'vpayments', 'completedCourses', 'incompleteCourses'));
    }

        // $purchaseHistory = Enrollment::with(['course', 'checkout'])->orderBy('enrollment_date', 'desc')->get();
       
}
