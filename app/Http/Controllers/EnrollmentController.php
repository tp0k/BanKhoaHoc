<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Vpayment;


class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollment = Enrollment::get();
        return view('backend.enrollment.index', compact('enrollment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enrollment = Enrollment::get();
        return view('backend.enrollment.create', compact('enrollment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($transactionID, $courseIDs, $userID, $p_time)
    {
        try {
            // Lấy thông tin từ bảng Vpayment theo transactionID
            $payment = Vpayment::where('transaction_id', $transactionID)->first();
    
            if($payment){
                // Tạo mảng để lưu các thông tin cần thiết cho mỗi khóa học
                $enrollments = [];
                foreach ($courseIDs as $courseID) {
                    $enrollments[] = [
                        'student_id' => $userID,
                        'payment_id' => $transactionID,
                        'course_id' => $courseID,
                        'enrollment_date' => $p_time,
                    ];
                }
    
                // Thêm các enrollment vào bảng enrollment
                Enrollment::insert($enrollments);
            } else {
                // Xử lý trường hợp không tìm thấy dữ liệu từ bảng vpayment
                \Session::flash('toastr', [
                    'type' => 'error',
                    'message' => 'Không tìm thấy dữ liệu từ bảng Vpayment'
                ]);
            }
        } catch (Exception $e) {
            \Session::flash('toastr', [
                'type' => 'error',
                'message' => 'Đã xảy ra lỗi khi thêm dữ liệu vào bảng Enrollment: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
