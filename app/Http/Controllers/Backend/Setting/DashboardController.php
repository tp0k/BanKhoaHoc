<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vpayment;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index()
    {
        // $user = User::get(); // collection của các đối tượng user
        $user = User::first(); // User là đối tượng
        if (fullAccess()){
            return view('backend.adminDashboard');
        }elseif ($user->role == 'instructor'){
            return view('backend.instructorDashboard'); 
        }else
            return view('backend.dashboard');

        // // $user = User::get();
        // if($user->role = 'instructor') 
        //     return view('backend.instructorDashboard');
    }

    public function dashboard()
    {
        // Tính tổng số học viên đã đăng ký
        $totalStudents = Enrollment::distinct('student_id')->count();

        // Tính tổng số tiền học viên đã thanh toán
        $totalPayments = $this->getTotalPayments();
        $totalCourses = $this->getTotalCourses();
        $enrollmentStatisticsByMonth = $this->enrollmentChart();
        $totalPaymentsByMonth = $this->getTotalPaymentsByMonth();
        // Truyền dữ liệu sang view
        return view('backend.dashboard', compact('totalStudents', 'totalPayments', 'totalCourses','enrollmentStatisticsByMonth','totalPaymentsByMonth'));
    }


    public function getTotalPayments()
    {
        // Sử dụng model của bảng VPayment để truy vấn tổng số tiền từ cột amount
        $totalPayments = VPayment::sum('amount');

        // Trả về tổng số tiền
        return $totalPayments;
    }

    public function getTotalCourses()
    {
        $totalCourses = Course::count();
        // dd($totalCourses);
        return $totalCourses;
    }

    public function enrollmentChart()
    {
        // Tính tổng số học viên đăng ký theo tháng
        $enrollmentStatisticsByMonth = Enrollment::selectRaw('MONTH(enrollment_date) as month, COUNT(DISTINCT student_id) as total_enrollments')
            ->groupByRaw('MONTH(enrollment_date)')
            ->get();

        return $enrollmentStatisticsByMonth;
    }

    public function getTotalPaymentsByMonth()
    {
        // Truy vấn dữ liệu doanh thu theo tháng
        $totalPaymentsByMonth = VPayment::selectRaw('YEAR(p_time) as year, MONTH(p_time) as month, SUM(amount) as total_payments')
            ->groupByRaw('YEAR(p_time), MONTH(p_time)')
            ->orderByRaw('YEAR(p_time) DESC, MONTH(p_time) DESC')
            ->get();

        return $totalPaymentsByMonth;
    }

}
