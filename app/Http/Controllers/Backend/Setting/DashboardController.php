<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
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

        // Truyền dữ liệu sang view
        return view('backend.dashboard', compact('totalStudents', 'totalPayments'));
    }


    public function getTotalPayments()
    {
        // Sử dụng join để kết nối bảng enrollment và bảng vpayment
        $totalPayments = Enrollment::join('vpayments', 'enrollments.payment_id', '=', 'vpayments.transaction_id')
            // Tính tổng số tiền từ trường amount trong bảng vpayments
            ->sum('vpayments.amount');

        return $totalPayments;
    }
}
