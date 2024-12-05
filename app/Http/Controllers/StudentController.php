<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function profile()
    {
        return view('pages.student-Profile');
    }

    public function invoice()
    {
        return view('pages.student-Invoice');
    }

    public function transaction()
    {
        return view('pages.student-Transaction');
    }

    public function update(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string',
            'major' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Simulate updating the student record in the database
        // Assuming you have a Student model
        $student = auth()->user(); // Example: Get the currently logged-in student
        $student->update($validatedData);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
