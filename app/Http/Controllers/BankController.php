<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('API_BASE_URL', 'https://stud-upright-skunk.ngrok-free.app/');
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
                \Log::error('Failed to fetch students: ' . $response->body());
                return null; // Return null if the request fails
            }
        } catch (\Exception $e) {
            \Log::error('Error fetching students: ' . $e->getMessage());
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
                \Log::error('Failed to fetch invoices: ' . $response->body());
                return null; // Return null if the request fails
            }
        } catch (\Exception $e) {
            \Log::error('Error fetching invoices: ' . $e->getMessage());
            return null; // Return null in case of an exception
        }
    }

        /**
     * Fetch all invoices from the API.
     *
     * @return array|null Returns an array of invoices or null if the request fails.
     */
    private function getAllVirtualAccounts()
    {
        try {
            $response = Http::get($this->apiUrl . 'api/virtualAccounts');

            if ($response->successful()) {
                return $response->json(); // Return all invoices as an array
            } else {
                \Log::error('Failed to fetch virtual account: ' . $response->body());
                return null; // Return null if the request fails
            }
        } catch (\Exception $e) {
            \Log::error('Error fetching virtual account: ' . $e->getMessage());
            return null; // Return null in case of an exception
        }
    }

    public function account()
    {
        $username = Auth::user()->username; // Get the logged-in user's username

        // Get all students from the API
        $students = $this->getAllStudents();

        // Find the student with the matching username
        $student = $students ? collect($students)->firstWhere('student_id', $username) : null;

        // Check if the student is found and pass it to the view
        return view('pages.bank-Account', compact('student'));
    }


    public function payment()
    {
        return view('pages.bank-Payment'); // Returns the login view
    }

    public function virtual()
    {
        // Get the logged-in user's username
        $username = Auth::user()->username;

        // Fetch the invoice details for all students using the reusable method
        $invoices = $this->getAllInvoices();
        $virtual_accounts = $this->getAllVirtualAccounts();
        $students = $this->getAllStudents();

        // Log the invoices for debugging purposes
        \Log::info('Invoices Data:', ['invoices' => $invoices]);
        \Log::info('Virtual Accounts Data:', ['virtual_accounts' => $virtual_accounts]);
        \Log::info('Student Data:', ['student' => $students]);

        // Initialize variables
        $invoice = null;
        $virtual_account = null;

        if ($invoices && count($invoices) > 0) {
            // Find the invoice for the currently logged-in student
            $invoice = collect($invoices)->firstWhere('student.student_id', $username);

            if ($invoice) {
                // Log the selected invoice
                \Log::info('Selected Invoice for student: ' . $username, ['invoice' => $invoice]);
            } else {
                // Log a warning if no invoice is found
                \Log::warning('No invoice found for student: ' . $username);
            }
        } else {
            // Log an error if no invoices are found
            \Log::error('No invoices found for any students');
        }

        if ($virtual_accounts && count($virtual_accounts) > 0) {
            // Find the virtual account for the currently logged-in student
            $virtual_account = collect($virtual_accounts)->firstWhere('invoice.student.student_id', $username);

            if ($virtual_account) {
                // Log the selected virtual account
                \Log::info('Selected Virtual Account for student: ' . $username, ['virtual_account' => $virtual_account]);
            } else {
                // Log a warning if no virtual account is found
                \Log::warning('No virtual account found for student: ' . $username);
            }
        } else {
            // Log an error if no virtual accounts are found
            \Log::error('No virtual accounts found for any students');
        }

        if ($students && count($students) > 0) {
            // Find the student based on the username
            $student = collect($students)->firstWhere('student_id', $username); // Match username with student_id

            if($student) {
                // Log the selected student
                \Log::info('Selected Student: ' . $username, ['student' => $student]);
            } else {
                // Log a warning if no student is found
                \Log::warning('No student found for student: ' . $username);
            }
        } else {
            $student = null; // If no students found, set student to null
            \Log::error('No students found for any students');
        }

        // Return the view with both the invoice and virtual account
        return view('pages.bank-Virtual', compact('invoice', 'virtual_account', 'student'));
    }

    public function succeedPayment()
    {
        return view('pages.bank-Succeed'); // Returns the login view
    }

    public function process(Request $request)
    {
        // Validate payment input
        $request->validate([
            'account_number' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        // Process the payment
        // Code to process the payment goes here...

        return redirect('/bank/home')->with('success', 'Payment processed successfully!');
    }

}
