<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function material()
    {
        return $this->hasMany(Material::class);
    }
    public function watchlist()
    {
        return $this->hasMany(Watchlist::class);
        //trạng thái hoàn thành 1 video coi là 1 watchlist 
    }
}
