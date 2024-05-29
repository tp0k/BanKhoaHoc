<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;

// lưu bình luận về csdl

class CommentController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'comment' => 'required',
        'course_id' => 'required',
    ]);
       
        $comment = new Comment;
        $comment->content = $request->comment;
        $comment->student_id = session('id');
        $comment->course_id = $request->course_id;
        $comment->created_at = now();
        $comment->save();

        return back()->with('success', 'Đăng thành công!');

}

}