<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_id',
        'schedule_time',
        'schedule_type'
    ];

    public function Student(){
        return $this->belongsTo(User::class);
    }

    public function Subject(){
        return $this->belongsTo(Subject::class);
    }
}
