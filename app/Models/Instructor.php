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
    

    public function classFaculties()
{
    return $this->hasMany(ClassFaculty::class, 'instructor_id');
}

public function classes()
{
    return $this->hasManyThrough(
        ClassModel::class,
        ClassFaculty::class,
        'instructor_id', // Foreign key on ClassFaculty table
        'id', // Foreign key on ClassModel table
        'id', // Local key on Instructor table
        'class_id' // Local key on ClassFaculty table
    );
}

public function courses()
{
    return $this->classes()->with('course');
}

}
