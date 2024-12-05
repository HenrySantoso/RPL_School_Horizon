<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Import Http Facade
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        // Define the base URL for the API (Ngrok URL)
        $this->apiUrl = 'https://47a9-202-152-159-219.ngrok-free.app/';
    }

    public function profile()
    {
        $username = Auth::user()->username;  // Get the logged-in user's username

        // Fetch the students from the API
        $response = Http::get($this->apiUrl . 'api/students');

        if ($response->successful()) {
            $students = $response->json();
            // Find the student based on the username
            $student = collect($students)->firstWhere('student_id', $username); // Match username with student_id
        } else {
            $student = null;
        }

        return view('pages.student-Profile', compact('student'));
    }

    public function getAllStudents()
    {
        // Perform the GET request to fetch all students
        $response = Http::get($this->apiUrl . 'api/students');

        if ($response->successful()) {
            // Use the response directly as data
            $students = $response->json();
        } else {
            // Fallback in case of an error
            $students = [];
        }

        // Pass data to the Blade view (if needed for another view)
        return view('test', ['students' => $students]);
    }
}
