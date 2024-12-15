<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        //$this->apiUrl = env('API_BASE_URL', 'https://stud-upright-skunk.ngrok-free.app/');
        //$this->apiUrl = env('API_BASE_URL', 'https://easily-pleasant-mustang.ngrok-free.app/');
        $this->apiUrl = env('API_BASE_URL', 'http://127.0.0.1:3000/');
    }

    /**
     * Fetch all students from the API.
     *
     * @return array|null Returns an array of students or null if the request fails.
     */
    private function getAllStudents()
    {
        try {
            $response = Http::get($this->apiUrl . 'api/students');

            if ($response->successful()) {
                return $response->json(); // Return all students as an array
            } else {
                return null; // Return null if the request fails
            }
        } catch (\Exception $e) {
            return null; // Return null in case of an exception
        }
    }

    /**
     * Fetch all invoices from the API.
     *
     * @return array|null Returns an array of invoices or null if the request fails.
     */
    private function getAllInvoices()
    {
        try {
            $response = Http::get($this->apiUrl . 'api/invoices');

            if ($response->successful()) {
                return $response->json(); // Return all invoices as an array
            } else {
                return null; // Return null if the request fails
            }
        } catch (\Exception $e) {
            return null; // Return null in case of an exception
        }
    }

    /**
     * Fetch all virtual accounts from the API.
     *
     * @return array|null Returns an array of virtual accounts or null if the request fails.
     */
    private function getAllVirtualAccounts()
    {
        try {
            $response = Http::get($this->apiUrl . 'api/virtualAccounts');

            if ($response->successful()) {
                return $response->json(); // Return all virtual accounts as an array
            } else {
                return null; // Return null if the request fails
            }
        } catch (\Exception $e) {
            return null; // Return null in case of an exception
        }
    }

    /**
     * Fetch all transactions from the API.
     *
     * @return array|null Returns an array of transactions or null if the request fails.
     */
    private function getAllTransactions()
    {
        try {
            $response = Http::get($this->apiUrl . 'api/transactions');

            if ($response->successful()) {
                return $response->json(); // Return all transactions as an array
            } else {
                return null; // Return null if the request fails
            }
        } catch (\Exception $e) {
            return null; // Return null in case of an exception
        }
    }

    public function profile()
    {
        $username = Auth::user()->username; // Get the logged-in user's username

        // Get all students using the reusable method
        $students = $this->getAllStudents();

        if ($students) {
            // Find the student based on the username
            $student = collect($students)->firstWhere('student_id', $username); // Match username with student_id
        } else {
            $student = null; // If no students found, set student to null
        }

        return view('pages.student-Profile', compact('student'));
    }

    public function getActiveVirtualAccount($virtualAccounts)
    {
        // Convert the array into a collection and filter for is_active == 1
        $virtual_account_student_active = collect($virtualAccounts)->firstWhere('is_active', 1);

        return $virtual_account_student_active;
    }

    public function invoice()
    {
        // Example JSON data (you can fetch this from your database or API)
        $virtualAccounts = $this->getAllVirtualAccounts(); // Assuming this retrieves the JSON data
        $invoices = $this->getAllInvoices();

        // Get the active virtual account
        $virtual_account_student_active = $this->getActiveVirtualAccount($virtualAccounts);
        $invoice = collect($invoices)->firstWhere('id', $virtual_account_student_active['invoice_id']);

        // Return the view with the active virtual account
        return view('pages.student-Invoice', compact('virtual_account_student_active', 'invoice'));
    }

    public function transaction()
    {
        // Get the logged-in user's student ID
        $loggedInStudentId = Auth::user()->username;

        // Fetch all transactions (assuming `getAllTransactions` returns the full JSON)
        $response = $this->getAllTransactions();
        $transactions = collect($response['data']); // Convert 'data' to a collection for easier handling

        // Filter transactions based on the logged-in user's student ID
        $filteredTransactions = $transactions->filter(function ($transaction) use ($loggedInStudentId) {
            return data_get($transaction, 'virtual_account.invoice.student.student_id') == $loggedInStudentId;
        });

        // Return the view with the filtered transactions
        return view('pages.student-Transaction', ['transactions' => $filteredTransactions]);
    }

    public function generateInvoice()
    {
        // Example JSON data (you can fetch this from your database or API)
        $virtualAccounts = $this->getAllVirtualAccounts(); // Assuming this retrieves the JSON data
        $invoices = $this->getAllInvoices();
        $students = $this->getAllStudents();

        // Get the active virtual account
        $virtual_account_student_active = $this->getActiveVirtualAccount($virtualAccounts);
        $invoice = collect($invoices)->firstWhere('id', $virtual_account_student_active['invoice_id']);
        $student = collect($students)->firstWhere('student_id', $virtual_account_student_active['invoice']['student']['student_id']);

        // Combine all data into a single array for the Blade view
        $data = [
            'virtual_account_student_active' => $virtual_account_student_active,
            'invoice' => $invoice,
            'student' => $student,
        ];

        // Generate the PDF from the view
        $pdf = PDF::loadView('invoice', $data);

        // Download the PDF as invoice_<student_id>.pdf
        return $pdf->download('invoice_' . $student['student_id'] . '.pdf');
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

        try {
            $username = Auth::user()->username; // Assume the username is the student_id

            // Update the student's profile via API
            $response = Http::put($this->apiUrl . 'api/students/' . $username, $validatedData);

            if ($response->successful()) {
                // Redirect back with a success message
                return redirect()->back()->with('success', 'Profile updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to update profile. Please try again later.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
    }
}
