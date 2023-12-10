<?php

namespace App\Models;

use App\Models\College;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GradStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'enrollment_status',
        'first_name',
        'middle_name',
        'last_name',
        'department_id',
        'college_id',
        'student_num',
        'GWA'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function college(){
        return $this->belongsTo(College::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function subjects(){
        //return $this->belongsToMany(Subject::class, 'subject_undergrad_student')->withPivot(['grade']);
        return $this->belongsToMany(Subject::class, 'subject_grad_student')
                    ->whereHas('department', function ($query) {
                        $query->where('id', $this->department_id);
                    })
                    ->withPivot(['grade']);
    }

    

    // public function section(){
    //     return $this->belongsTo(Section::class);
    // }
}
