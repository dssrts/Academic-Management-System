<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StudentConcernController extends Controller
{
    public function get(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user
        $userId = Auth::id(); // Get the authenticated user's ID
        return view('Student.student-concerns', [
            'student_no' => $userId,
        ]);
    }

    public function fetchEmails(Request $request)
    {
        $subject = $request->input('subject');
        $emails = [];

        if ($subject == 'Academic Performance Concerns' || $subject == 'Course Grade Concerns') {
            $emails = DB::table('instructors')->pluck('email_address');
        } else {
            $emails = DB::table('employees')->pluck('school_email');
        }

        return response()->json($emails);
    }

    public function submit(Request $request)
    {
        // Validate the form data
        $request->validate([
            'studentnumber' => 'required|string',
            'recipientemail' => 'required|string|email',
            'subject' => 'required|string',
            'message' => 'required|string',
            'pdf_file' => 'nullable|mimes:pdf|max:2048'
        ]);

        // Get the form data
        $student_no = $request->input('studentnumber');
        $recipient_email = $request->input('recipientemail');
        $subject = $request->input('subject');
        $message = $request->input('message');

        // Handle file upload
        $filepath = null;
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $filepath = $file->move(public_path('uploads'), $filename);
            $filepath = 'uploads/' . $filename; // Store relative path
        }

        // Get the user_id based on the recipient email
        $user_id = DB::table('employees')->where('school_email', $recipient_email)->value('employee_id');
        if (!$user_id) {
            $user_id = DB::table('instructors')->where('email_address', $recipient_email)->value('id');
        }

        // Store the data in the appeals table
        DB::table('appeals')->insert([
            'user_id' => $user_id,
            'student_no' => $student_no,
            'subject' => $subject,
            'message' => $message,
            'filepath' => $filepath,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Return a response or redirect
        return redirect()->back()->with('send', 'success');
    }
}

