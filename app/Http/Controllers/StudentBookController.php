<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentBookController extends Controller
{
    public function get(Request $request)
    {
        $userId = Auth::id(); // Get the authenticated user's ID
        $user = Auth::user();
        
        return view('Student.student-ogts-appoinment', [
        ]);    
    }
}
