<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassFaculty extends Model
{
    use HasFactory;
    protected $table = 'class_faculty';

    public function instructor()
{
    return $this->belongsTo(Instructor::class, 'instructor_id');
}

public function class()
{
    return $this->belongsTo(ClassModel::class, 'class_id');
}


public function course()
{
    return $this->belongsTo(Course::class, 'course_id');
}
}
