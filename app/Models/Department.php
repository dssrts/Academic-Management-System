<?php

namespace App\Models;

use App\Models\College;
use App\Models\UndergradStudent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;
    protected $primaryKey = 'department_id'; // Custom primary key
    protected $fillable = [
        'code',
        'title',
        'college_id',
    ];

    public function college(){
        return $this->belongsTo(College::class);
    }
    public function UndergradStudents(){
        return $this->hasMany(UndergradStudent::class);
    }

    
    // public function GradStudents(){
    //     return $this->hasMany(GradStudent::class);
    // }
    // public function blocks(){
    //     return $this->hasMany(Section::class);
    // }
}
