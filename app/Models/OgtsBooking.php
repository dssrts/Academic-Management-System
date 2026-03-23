<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OgtsBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_no',
        'recipient_email',
        'message',
        'subject',
        'status',
        'viewed',
    ];
}
