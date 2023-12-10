<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    use HasFactory;
    public function exam(){
        return $this->belongsTo(Exams::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'name',
        'exam_id',
        'student_id',
        'date',
        'Action',
    ];


}
