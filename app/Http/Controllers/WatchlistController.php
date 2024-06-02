<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{

public function store(Request $request)
{
    // Lấy dữ liệu từ yêu cầu
    $student_id = $request->input('student_id');
    $course_id = $request->input('course_id');
    $lesson_id =$request->input('lesson_id');
    $material_id = $request->input('material_id');
    $completed = $request->input('completed');

    // Lưu dữ liệu vào bảng watchlists
    DB::table('watchlists')->insert([
        'student_id' => $student_id,
        'course_id' => $course_id,
        'lesson_id'=> $lesson_id,
        'material_id' => $material_id,
        'completed' => $completed,
    ]);

    // Trả về phản hồi cho yêu cầu AJAX
    return response()->json(['status' => 'success']);
}


}
