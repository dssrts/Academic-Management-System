<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSfeStudent extends Model
{
    use HasFactory;
    protected $table = 'course_sfe_students'; // specify the table name if it doesn't follow the plural naming convention
    protected $fillable = [
        'student_no',
        'course_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
