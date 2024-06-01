<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventShowController extends Controller
{
    public function index()
    {
        $events = Event::all(); // Lấy tất cả các sự kiện từ bảng event
        return view('events.index', compact('events')); // Trả về view 'events.index' và truyền danh sách sự kiện
    }

    public function single($id)
    {
        $event = Event::find($id); // Tìm sự kiện dựa trên ID
        if ($event) {
            return view('events.single', compact('event')); // Nếu tìm thấy, trả về view 'events.single' và truyền sự kiện
        } else {
            abort(404); // Nếu không tìm thấy, trả về trang lỗi 404
        }
    }

}
