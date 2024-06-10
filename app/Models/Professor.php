<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    protected $fillable = [
        'college_id',
        'last_name',
        'first_name',
        'middle_name',
        'pronouns',
        'plm_email',
    ];

    public function college()
    {
        return $this->belongsTo(College::class);
    }
    public function classes()
    {
        return $this->hasMany(ClassModel::class);
    }
    public function professor()
{
    return $this->belongsTo(Professor::class);
}

public function courses()
{
    return $this->hasManyThrough(
        Course::class,
        ClassFaculty::class,
        'instructor_id', // Foreign key on ClassFaculty table
        'id', // Foreign key on Course table
        'id', // Local key on Instructor table
        'course_id' // Local key on ClassFaculty table
    );
}

}
