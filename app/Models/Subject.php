<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'lecture_id',
    ];

    public function Lecture(){
        return $this->belongsTo(User::class);
    }

    public function Schedule(){
        return $this->hasMany(Schedule::class);
    }
}
