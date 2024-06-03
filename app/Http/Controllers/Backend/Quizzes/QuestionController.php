<?php

namespace App\Http\Controllers\Backend\Quizzes;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Quiz;
use Exception;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index()
    {
        $question = Question::paginate(10);
        return view('backend.quiz.question.index', compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $quiz = Quiz::get();
        return view('backend.quiz.question.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $question = new Question;
            $question->quiz_id = $request->quizId;
            $question->type = $request->questionType;
            $question->content = $request->questionContent;
            $question->option_a = $request->optionA;
            $question->option_b = $request->optionB;
            $question->option_c = $request->optionC;
            $question->option_d = $request->optionD;
            $question->correct_answer = $request->correctAnswer;

            if ($question->save()) {
                $this->notice::success('Data Saved');
                return redirect()->route('question.index');
            } else {
                $this->notice::error('Please try again');
                return redirect()->back()->withInput();
            }
        } catch (Exception $e) {
            dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $quiz = Quiz::get();
        $question = Question::findOrFail(encryptor('decrypt',$id));
        return view('backend.quiz.question.edit', compact('quiz', 'question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $question = Question::findOrFail(encryptor('decrypt', $id));
            $question->quiz_id = $request->quizId;
            $question->type = $request->questionType;
            $question->content = $request->questionContent;
            $question->option_a = $request->optionA;
            $question->option_b = $request->optionB;
            $question->option_c = $request->optionC;
            $question->option_d = $request->optionD;
            $question->correct_answer = $request->correctAnswer;

            if ($question->save()) {
                $this->notice::success('Data Saved');
                return redirect()->route('question.index');
            } else {
                $this->notice::error('Please try again');
                return redirect()->back()->withInput();
            }
        } catch (Exception $e) {
            dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Question::findOrFail(encryptor('decrypt', $id));
        if ($data->delete()) {
            $this->notice::error('Data Deleted!');
            return redirect()->back();
        }
    }


    public function showRandomQuestions($quiz_id)
{
    $randomQuestions = Question::where('quiz_id', $quiz_id)->inRandomOrder()->take(5)->get();
    return view('frontend.quizz', ['questions' => $randomQuestions]);
}

public function saveAnswers(Request $request)
{
    $answers = $request->input('answers');
    foreach ($answers as $answer) {
            DB::table('answers')->insert([
                'student_id' => $answer['student_id'],
                'question_id' => $answer['question_id'],
                'answer' => $answer['answer'],
            ]);
        }

    return response()->json(['message' => 'Câu trả lời đã được lưu!']);
}


public function checkQuiz(Request $request)
{
    $studentId = $request->input('student_id');
    $quizId = $request->input('quiz_id');

    // Kiểm tra xem người dùng đã từng làm bài kiểm tra này chưa
    $existingAnswers = DB::table('answers')
        ->join('questions', 'answers.question_id', '=', 'questions.id')
        ->where('answers.student_id', $studentId)
        ->where('questions.quiz_id', $quizId)
        ->count();

    if ($existingAnswers > 0) {
        // Người dùng đã từng làm bài kiểm tra này
        // Lấy câu hỏi và số câu trả lời đúng
        $questions = DB::table('questions')
            ->where('quiz_id', $quizId)
            ->get();

        $correctCount = DB::table('answers')
            ->join('questions', 'answers.question_id', '=', 'questions.id')
            ->where('answers.student_id', $studentId)
            ->where('questions.quiz_id', $quizId)
            ->whereColumn('answers.answer', 'questions.correct_answer')
            ->count();

        return response()->json([
            'done' => true,
            'questions' => $questions,
            'correct_count' => $correctCount,
        ]);
    } else {
        // Người dùng chưa từng làm bài kiểm tra này
        return response()->json([
            'done' => false,
        ]);
    }
}


}