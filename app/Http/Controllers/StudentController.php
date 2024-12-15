<?php

namespace App\Http\Controllers;

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

        /**
     * Fetch all invoices from the API.
     *
     * @return array|null Returns an array of invoices or null if the request fails.
     */
    private function getAllTransactions()
    {
        try {
            $response = Http::get($this->apiUrl . 'api/transactions');

            if ($response->successful()) {
                return $response->json(); // Return all invoices as an array
            } else {
                \Log::error('Failed to fetch transactions: ' . $response->body());
                return null; // Return null if the request fails
            }
        } catch (\Exception $e) {
            \Log::error('Error fetching transactions: ' . $e->getMessage());
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

    public function invoice()
    {
        // Get the logged-in user's username
        $username = Auth::user()->username;

        // Fetch the invoice details for all students using the reusable method
        $invoices = $this->getAllInvoices();
        $virtual_accounts = $this->getAllVirtualAccounts();

        // Log the invoices for debugging purposes
        \Log::info('Invoices Data:', ['invoices' => $invoices]);
        \Log::info('Virtual Accounts Data:', ['virtual_accounts' => $virtual_accounts]);

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

        // Return the view with both the invoice and virtual account
        return view('pages.student-Invoice', compact('invoice', 'virtual_account'));
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

        if ($filteredTransactions->isNotEmpty()) {
            \Log::info('Filtered Transactions:', ['transactions' => $filteredTransactions->toArray()]);
        } else {
            \Log::warning('No transactions found for student ID: ' . $loggedInStudentId);
        }

        // Return the view with the filtered transactions
        return view('pages.student-Transaction', ['transactions' => $filteredTransactions]);
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
                // Log the error and show an error message
                \Log::error('Failed to update profile: ' . $response->body());
                return redirect()->back()->with('error', 'Failed to update profile. Please try again later.');
            }
        } catch (\Exception $e) {
            // Log the exception and show an error message
            \Log::error('Error updating profile: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
    }
}
