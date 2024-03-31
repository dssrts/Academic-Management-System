<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_no',
        'last_name',
        'first_name',
        'middle_name',
        'biological_sex',
        'birthdate',
        'birthdate_city',
        'religion',
        'civil_status',
        'student_type',
        'registration_status',
        'year_level',
        'college_id',
        'department_id',
        'academic_year',
        'permanent_address',
        'plm_email',
        'personal_email',
        'mobile_no', 
        'telephone_no', 
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class)->where('account_type', 'Student');
    }
    
    public function college(){
        return $this->belongsTo(College::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
}