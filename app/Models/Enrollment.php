<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id', 'student_id'
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public static function isEnrolled($courseID, $studentId)
    {
        return self::where('course_id', $courseID)
                ->where('student_id', $studentId)
                ->exists();
    }
}
