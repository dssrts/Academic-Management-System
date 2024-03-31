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
        'plm'
    ];
}
