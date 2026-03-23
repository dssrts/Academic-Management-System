<?php

namespace App\Models;

use App\Models\Department;
use App\Models\GradStudent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'college_id',
        'department_id',
        'subject_code',
        'subject_title',
        'units',
        'faculty',
        'year',
        'remarks'
    ] ;
    
    public function college(){
        return $this->belongsTo(College::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }

    // public function faculty(){
    //     return $this->hasMany(Faculty::class);
    // }
    public function faculties(){
        return $this->belongsToMany(Instructor::class ,'faculty_subject');
    }
    
    public function classes()
{
    return $this->hasMany(ClassModel::class, 'course_id');
}


    public function classFaculties()
{
    return $this->hasMany(ClassFaculty::class, 'course_id');
}

public function instructors()
{
    return $this->hasManyThrough(
        Instructor::class,
        ClassFaculty::class,
        'course_id', // Foreign key on ClassFaculty table
        'id', // Foreign key on Instructor table
        'id', // Local key on Course table
        'instructor_id' // Local key on ClassFaculty table
    );
}


}
