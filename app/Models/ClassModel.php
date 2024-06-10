<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    protected $table = 'classes'; 
    protected $fillable = [
        'id',
        'student_record_id',
        'professor_id',
        'code', 
        'section',
        'name',
        'description',
        'units',
        'day',
        'start_time',
        'end_time',
        'building',
        'room',
        'type',
        'created_at',
        'updated_at',
    ] ;
    public function studentRecord()
    {
        return $this->belongsTo(StudentRecord::class, 'student_record_id');
    }
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
    

    public function course()
{
    return $this->belongsTo(Course::class, 'course_id');
}

public function classFaculties()
{
    return $this->hasMany(ClassFaculty::class, 'class_id');
}
public function studentTerm()
{
    return $this->belongsTo(StudentTerm::class, 'program_id', 'program_id');
}


public function classSchedules()
{
    return $this->hasMany(ClassSchedule::class, 'class_id', 'id');
}

public function students()
{
    return $this->belongsToMany(StudentTerm::class, 'class_student', 'class_id', 'student_no', 'id', 'student_no');
}
public function schedules()
    {
        return $this->hasMany(ClassSchedule::class, 'class_id', 'id');
    }
}
