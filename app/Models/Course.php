<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_en', 'price', 'image'
    ];

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class); 
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function material()
    {
        return $this->hasMany(Material::class);
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }


    public function enrollment()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id');
    }
    public function watchlist()
    {
        return $this->hasMany(Watchlist::class);
    }
}
