<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'image',
        'dept_id',
        'level_id',
        'subject',
        'instructor_id',
        'description',
        'duration',
        'start_datetime',
        'end_datetime',
    ];
    public function level(){
        return $this->belongsTo(Level::class);
    }
    public function dept(){
        return $this->belongsTo(Departments::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function instructor(){
        return $this->belongsTo(User::class);
    }
    public function students(){
        return $this->hasMany(User::class);
    }

}
