<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    protected $table = 'classes'; 
    protected $fillable = [
        'id',
        'student_record_id',
        'professor_id',
        'code', 
        'section',
        'name',
        'description',
        'units',
        'day',
        'start_time',
        'end_time',
        'building',
        'room',
        'type',
        'created_at',
        'updated_at',
    ] ;
    public function studentRecord()
    {
        return $this->belongsTo(StudentRecord::class);
    }
}
