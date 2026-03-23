<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentInboxController extends Controller
{
    public function get(Request $request)
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Fetch appeals for the authenticated user
        $appeals = DB::table('appeals')
            ->where('student_no', $userId)
            ->get();

        $emails = [];

        foreach ($appeals as $appeal) {
            $instructor = DB::table('instructors')
                ->where('id', $appeal->user_id)
                ->first();

            $employee = DB::table('employees')
                ->where('employee_id', $appeal->user_id)
                ->first();

            if ($employee) {
                $emails[$appeal->id] = $employee->school_email;
            } elseif ($instructor) {
                $emails[$appeal->id] = $instructor->email_address;
            } else {
                $emails[$appeal->id] = null; // or handle the case when no email found
            }
        }

        return view('Student.student-inbox', [
            'appeals' => $appeals,
            'emails' => $emails,
        ]);
    }
}
