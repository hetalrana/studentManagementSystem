<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Subject;

class StudentController extends Controller
{
     public function dashboard()
    {
        $student = auth()->user()->student;
        return view('student.dashboard', compact('student'));
    }
    public function addSubject(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255'
        ]);

        $student = auth()->user()->student;

        Subject::create([
            'student_id' => $student->id,
            'subject' => $request->subject
        ]);

        return back()->with('success', 'Subject added successfully!');
    }

     public function editSubject($id)
    {
        $student = auth()->user()->student;
        $subject = $student->subjects()->findOrFail($id);
        return view('student.edit_subject', compact('subject'));
    }

    public function updateSubject(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required|string|max:255'
        ]);

        $student = auth()->user()->student;
        $subject = $student->subjects()->findOrFail($id);
        $subject->update([
            'subject' => $request->subject
        ]);

        return redirect('/dashboard')->with('success', 'Subject updated successfully!');
    }

    public function deleteSubject($id)
    {
        $student = auth()->user()->student;
        $subject = $student->subjects()->findOrFail($id);
        $subject->delete();

        return back()->with('success', 'Subject deleted successfully!');
    }
}
