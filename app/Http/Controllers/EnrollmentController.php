<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\Enrollment;

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
    public function store(Request $request)
    {
        // try {
        //     $enrollmen = new Enrollment;
        //     $enrollmen->quiz_id = $request->quizId;
        //     $enrollmen->type = $request->questionType;
        //     $enrollmen->content = $request->questionContent;
        //     $enrollmen->option_a = $request->optionA;
        //     $enrollmen->option_b = $request->optionB;
        //     $enrollmen->option_c = $request->optionC;
        //     $enrollmen->option_d = $request->optionD;
        //     $enrollmen->correct_answer = $request->correctAnswer;

        //     if ($enrollmen->save()) {
        //         $this->notice::success('Data Saved');
        //         return redirect()->route('question.index');
        //     } else {
        //         $this->notice::error('Please try again');
        //         return redirect()->back()->withInput();
        //     }
        // } catch (Exception $e) {
        //     dd($e);
        //     $this->notice::error('Please try again');
        //     return redirect()->back()->withInput();
        // }
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
