<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::get();
        return view('backend.event.index', compact('event'));
    }
    public function create()
    {
        return view('backend.event.create');
    }

    public function store(Request $request)
    {
        try {
            $event = new Event;
            $event->title = $request->title;
            $event->description = $request->description;
            $event->content = $request->content;

            if ($request->hasFile('image')) {
                $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/events'), $imageName);
                $event->image = $imageName;
            }
            if ($event->save()) {
                $this->notice::success('Lưu dự liệu!');
                return redirect()->route('event.index');
            } else {
                $this->notice::error('Vui lòng thử lại!');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            dd($e);
            $this->notice::error('Vui lòng thử lại!');
            return redirect()->back()->withInput();
        }
    }


    public function show(Event $event)
    {
        //
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('backend.event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->title = $request->title;
            $event->description = $request->description;
            $event->content = $request->content;
            if ($request->hasFile('image')) {
                $imageName = rand(999, 111) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/events'), $imageName);
                $event->image = $imageName;
            }
            if ($event->save()) {
                $this->notice::success('Lưu dữ liệu!');
                return redirect()->route('event.index');
            } else {
                $this->notice::error('Vui lòng thử lại!');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            dd($e);
            $this->notice::error('Vui lòng thử lại!');
            return redirect()->back()->withInput();
        }
    }
    public function destroy($id)
    {
        $data = Event::findOrFail($id);
        if ($data->delete()) {
            $this->notice::error('Xoá dữ liệu!');
            return redirect()->back();
        }
    }
}
