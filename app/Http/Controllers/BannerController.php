<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Event;
use Exception;
class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::get();
        return view('backend.banners.index', compact('banners'));
    }
    
    public function create()
    {
        $events = Event::get();
        // $events = DB::table('events')->get();
        return view('backend.banners.create', compact('events'));
    }

    public function store(Request $request)
    {
        try {
        $banner = new Banner();
        $banner->title_banner = $request->title_banner;
        $banner->events_id=$request->events_id;
        $banner->description=$request->description;


        if ($request->hasFile('image')) {
            $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
            $request->image->move(public_path('banners'), $imageName);
            $banner->image = $imageName;
        }
        if ($banner->save())
        return redirect()->route('admin.banner.index')->with('success', 'Data Saved');
    else
        return redirect()->back()->withInput()->with('error', 'Please try again');
    } catch (Exception $e) {
        dd($e);
        return redirect()->back()->withInput()->with('error', 'Please try again');
    }
}
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
    $events = Event::all(); // Truy vấn tất cả các sự kiện để cung cấp cho view
    return view('backend.banners.edit', compact('banner', 'events'));
    }

    public function update(Request $request, $id)
{
    try {
        $banner = Banner::findOrFail($id); // Tìm banner thay vì event
        $banner->title_banner = $request->title_banner;
        $banner->description = $request->description;
        $banner->events_id = $request->events_id;
        
        if ($request->hasFile('image')) {
            $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/banners'), $imageName); // Sửa đường dẫn upload ảnh
            $banner->image = $imageName;
        }
        
        if ($banner->save()) {
            $this->notice::success('Lưu dữ liệu!');
            return redirect()->route('admin.banner.index');
        } else {
            $this->notice::error('Vui lòng thử lại!');
            return redirect()->back()->withInput();
        }
    } catch (Exception $e) {
        dd($e);
        $this->notice::error('Vui lòng thử lại!');
        return redirect()->back()->withInput();
    }
}
    public function destroy($id)
    {
    $data = Banner::findOrFail($id);
        if ($data->delete()) {
            $this->notice::error('Xoá dữ liệu!');
            return redirect()->back();
        }

}
}