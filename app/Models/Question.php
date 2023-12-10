<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;


    protected $fillable = [
        'type',
        'exam_id',
        'question',
        'options',
        'correct_answers',
        'points_awarded',
    ];

    public function exam(){
        return $this->belongsTo(Exams::class);
    }

}
