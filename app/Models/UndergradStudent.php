<?php

namespace App\Models;

use App\Models\College;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UndergradStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'reg_status',
        'enrollment_status',
        'first_name',
        'middle_name',
        'last_name',
        'department_id',
        'account_id',
        'college_id',
        'student_number'
        ,
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
        return $this->belongsToMany(Subject::class, 'subject_undergrad_student')
                    ->whereHas('department', function ($query) {
                        $query->where('id', $this->department_id);
                    })
                    ->withPivot(['grade']);
    }
}
