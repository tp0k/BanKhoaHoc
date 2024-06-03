<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Http\Requests\Backend\banners\AddNewRequest;
use App\Http\Requests\Backend\banners\UpdateRequest;
use Exception;
use File;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::get();
        return view('backend.banners.index', compact('banners'));
    }
        // $events = Event::all();
     
    /**
     * Show a list of all of the application's users.
     */
    
    
        // $users = DB::table('banners')->get();
 
        // return view('backend.banners.index', ['users' => $users]);
    
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
    public function edit(Banner $banner)
    {
        return view('backend.banners.edit', compact('banner'));
    }
    // public function edit($id)
    // {
    //     $courseCategory = CourseCategory::get();
    //     $instructor = Instructor::get();
    //     $course = Course::findOrFail(encryptor('decrypt', $id));
    //     return view('backend.course.courses.edit', compact('courseCategory', 'instructor', 'course'));
    // }

    public function update(Request $request, $id)
{
    try {
        $decryptedId = Crypt::decryptString($id);  // Sử dụng lớp Crypt để giải mã
        $banner = Banner::findOrFail($decryptedId);
        
        // Cập nhật các trường khác
        $banner->title_banner = $request->title_banner;
        $banner->events_id = $request->events_id;
        $banner->description = $request->description;

        if ($request->hasFile('image')) {
            $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
            $request->image->move(public_path('banners'), $imageName);
            $banner->image = $imageName;
        }

        if ($banner->save())
            return redirect()->route('admin.banner.index')->with('success', 'Data Saved');
        else
            return redirect()->back()->withInput()->with('error', 'Please try again');
    } catch (DecryptException $e) {
        return redirect()->back()->withInput()->with('error', 'Invalid ID');
    } catch (Exception $e) {
        return redirect()->back()->withInput()->with('error', 'Please try again');
    }
}
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return redirect()->route('admin.banner.index');
    }

}