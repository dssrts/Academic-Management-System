<?php

namespace App\Models;

use App\Models\Department;
use App\Models\UndergradStudent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class College extends Model
{
    use HasFactory;

    protected $fillable = [
        'Code',
        'Title',
    ];

    public function UndergradStudents(){
        return $this->hasMany(UndergradStudent::class);
    }
    public function GradStudents(){
        return $this->hasMany(GradStudent::class);
    }
    public function departments(){
        return $this->hasMany(Department::class);
    }
    public function faculty(){
        return $this->hasMany(Faculty::class);
    }
}
