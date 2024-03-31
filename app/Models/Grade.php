<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'undergrad_student_id',
        'subject_id',
        'grade',
        'completion_grade',
        'remarks' 
    ];
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    
}
