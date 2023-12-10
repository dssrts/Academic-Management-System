<?php

namespace App\Models;

use App\Models\College;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'college_id',
        'first_name',
        'middle_name',
        'last_name',
    ] ;

    public function college(){
        return $this->belongsTo(College::class);
    }
    // public function subjects(){
    //     return $this->hasMany(Subject::class);
    // }

    public function subjects(){
        return $this->belongsToMany(Subject::class ,'faculty_subject');
    }
}
