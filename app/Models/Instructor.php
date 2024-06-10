<?php

namespace App\Models;

use App\Models\College;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'college_id',
        'first_name',
        'middle_name',
        'last_name',
    ] ;

    public function college(){
        return $this->belongsTo(College::class);
    }
    // public function subjects(){
    //     return $this->hasMany(Subject::class);
    // }

    public function subjects(){
        return $this->belongsToMany(Course::class ,'faculty_subject');
    }
    public function classes()
    {
        return $this->belongsToMany(ClassModel::class, 'class_faculty', 'instructor_id', 'class_id');
    }

    public function courses()
    {
        return $this->hasManyThrough(Course::class, ClassModel::class, 'id', 'id', 'id', 'course_id')
                    ->join('class_faculty', 'class_faculty.class_id', '=', 'classes.id')
                    ->where('class_faculty.instructor_id', $this->id);
    }
}
