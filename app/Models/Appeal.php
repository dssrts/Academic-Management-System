<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    use HasFactory;

    protected $table = 'appeals'; // Specify the table name

    protected $fillable = [
        'student_id',
        'user_id',
        'message',
        'subject',
        'filepath',
        'viewed',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
