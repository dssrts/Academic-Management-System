<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRecord extends Model
{
    use HasFactory;

    protected $table = 'student_records';

    protected $fillable = [
        'student_id',
        'control_no',
        'status',
        'school_year',
        'semester',
        'date_enrolled',
        'gwa',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }


    public function classes()
    {
        return $this->hasMany(ClassModel::class);
    }

}
