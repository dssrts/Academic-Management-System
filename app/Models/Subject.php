<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'college_id',
        'department_id',
        'subject_code',
        'subject_title',
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
        return $this->belongsToMany(Faculty::class ,'faculty_subject');
    }
    public function undergradStudents(){
        return $this->belongsToMany(UndergradStudent::class, 'subject_undergrad_student')->withPivot(['grade']);
    }
}
