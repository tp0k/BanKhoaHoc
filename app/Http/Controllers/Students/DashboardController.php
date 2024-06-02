<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Enrollment;
use App\Models\Course;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Models\Vpayment;

class DashboardController extends Controller
{
    public function index()
    {
        $vpayments = VPayment::where('user_id', currentUserId())->orderBy('p_time', 'desc')->get();
        $student_info = Student::find(currentUserId());
        $enrollment = Enrollment::where('student_id', currentUserId())->get();
        $course = Course::get();
        $checkout = Checkout::where('student_id', currentUserId())->get();
        // $purchaseHistory = Enrollment::with(['course', 'checkout'])->orderBy('enrollment_date', 'desc')->get();
        return view('students.dashboard', compact('student_info','enrollment', 'course','checkout', 'vpayments'));
    }
}
