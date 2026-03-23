<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OgtsBooking;

class StudentBookController extends Controller
{
    public function get(Request $request)
    {
        $userId = Auth::id(); // Get the authenticated user's ID
        $user = Auth::user();
        
        return view('Student.student-ogts-appoinment');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'plmemail' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        $userId = Auth::id(); // Get the authenticated user's ID
        $user = Auth::user();
        OgtsBooking::create([
            'student_no' => $userId,
            'recipient_email' => $request->input('recipientemail'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'status' => false,
            'viewed' => false,
        ]);

        return redirect()->back()->with('success', 'Appointment booked successfully.');
    }
}
