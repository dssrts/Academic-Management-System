<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'building',
        'room_number',
        'type',
        'day',
        'time',
        'status',
        'subject_id',
    ];

    public function subject():BelongsTo {
        return $this->belongsTo(Subject::class);
    }

}
