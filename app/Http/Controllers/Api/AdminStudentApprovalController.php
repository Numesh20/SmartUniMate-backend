<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminStudentApprovalController extends Controller
{
    /**
     * Get a list of pending student registrations.
     * GET /api/admin/students/pending
     */
    public function pending()
    {
        $students = Student::where('is_approved', false)->orderBy('created_at', 'asc')->get();
        return response()->json(['students' => $students]);
    }

    /**
     * Approve a student registration.
     * POST /api/admin/students/{id}/approve
     */
    public function approve($id)
    {
        $student = Student::findOrFail($id);
        
        $student->update(['is_approved' => true]);

        return response()->json(['message' => 'Student approved successfully.', 'student' => $student]);
    }

    /**
     * Reject a student registration (deletes the record).
     * POST /api/admin/students/{id}/reject
     */
    public function reject($id)
    {
        $student = Student::findOrFail($id);
        
        // As per the plan, rejection deletes the record so they can try registering again if they made a mistake.
        $student->delete();

        return response()->json(['message' => 'Student registration rejected and removed.']);
    }
}
