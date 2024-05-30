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
}
