<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTerm extends Model
{
    use HasFactory;
    protected $table= 'student_terms';

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_no', 'student_no');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }

    public function classes()
    {
        return $this->belongsToMany(ClassModel::class, 'class_student', 'student_no', 'class_id', 'student_no', 'id');
    }
}
