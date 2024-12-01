<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;  // Make sure you are importing the correct User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // Show the login form for bank
    public function showLoginBankForm()
    {
        return view('auth.loginBankApp'); // Returns the login view
    }

    // Show the login form for student
    public function showLoginStudentForm()
    {
        return view('auth.loginStudentApp'); // Returns the login view
    }

    // Handle student login
    public function loginStudent(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        // Fetch user by username
        $user = User::where('username', $credentials['username'])->first();

        // Check if the user exists and the password matches
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Check if the role is student
            if ($user->role === 'student') {
                Auth::login($user); // Log in the student
                return redirect('/student/profile'); // Redirect to student dashboard
            } else {
                // If the role is not 'student'
                return redirect()->back()->withErrors(['role' => 'Unauthorized role. You must be a student to access this page.']);
            }
        }

        // If credentials are incorrect
        return redirect()->back()->withErrors(['loginStudent' => 'Invalid credentials. Please check your username and password.']);
    }

    // Method to logout student
    public function logoutStudent(Request $request)
    {
        // Log out the current user
        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Redirect to login page
        return redirect()->route('loginStudent'); // Redirect back to login page
    }
}
