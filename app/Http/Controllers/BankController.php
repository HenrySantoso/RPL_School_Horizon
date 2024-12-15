<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BankController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        //$this->apiUrl = env('API_BASE_URL', 'https://stud-upright-skunk.ngrok-free.app/');
        //$this->apiUrl = env('API_BASE_URL', 'https://easily-pleasant-mustang.ngrok-free.app/');
        $this->apiUrl = env('API_BASE_URL', 'http://127.0.0.1:3000/');
    }

    // Method to retrieve all students
    private function getAllStudents()
    {
        try {
            $response = Http::get($this->apiUrl . 'api/students');
            return $response->successful() ? $response->json() : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    // Method to retrieve all invoices
    private function getAllInvoices()
    {
        try {
            $response = Http::get($this->apiUrl . 'api/invoices');
            return $response->successful() ? $response->json() : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    // Method to retrieve all virtual accounts
    private function getAllVirtualAccounts()
    {
        try {
            $response = Http::get($this->apiUrl . 'api/virtualAccounts');
            return $response->successful() ? $response->json() : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    // Method to retrieve all transactions
    private function getAllTransactions()
    {
        try {
            $response = Http::get($this->apiUrl . 'api/transactions');
            return $response->successful() ? $response->json() : null;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function account()
    {
        $username = Auth::user()->username;
        $students = $this->getAllStudents();
        $student = $students ? collect($students)->firstWhere('student_id', $username) : null;
        return view('pages.bank-Account', compact('student'));
    }

    public function payment()
    {
        return view('pages.bank-Payment');
    }

    public function getActiveVirtualAccount($virtualAccounts)
    {
        // Convert the array into a collection and filter for is_active == 1
        $virtual_account_student_active = collect($virtualAccounts)->firstWhere('is_active', 1);

        return $virtual_account_student_active;
    }

    public function virtual()
    {
        $virtualAccounts = $this->getAllVirtualAccounts();
        $students = $this->getAllStudents();

        // Get the active virtual account
        $virtual_account_student_active = $this->getActiveVirtualAccount($virtualAccounts);
        $student = $students ? collect($students)->firstWhere('student_id', $virtual_account_student_active['invoice']['student']['student_id']) : null;

        // Return the view with the active virtual account
        return view('pages.bank-Virtual', compact('virtual_account_student_active', 'student'));
    }

    public function virtualDetails()
    {
        $virtualAccounts = $this->getAllVirtualAccounts();
        $students = $this->getAllStudents();

        // Get the active virtual account
        $virtual_account_student_active = $this->getActiveVirtualAccount($virtualAccounts);
        $student = $students ? collect($students)->firstWhere('student_id', $virtual_account_student_active['invoice']['student']['student_id']) : null;

        // Return the view with the active virtual account
        return view('pages.bank-VirtualDetails', compact('virtual_account_student_active', 'student'));
    }

    public function completePayment(Request $request)
    {
        $username = Auth::user()->username;

        // Get all virtual accounts and students
        $virtualAccounts = $this->getAllVirtualAccounts();
        $students = $this->getAllStudents();

        // Get the active virtual account
        $virtual_account_student_active = $this->getActiveVirtualAccount($virtualAccounts);
        $student = $students ? collect($students)->firstWhere('student_id', $virtual_account_student_active['invoice']['student']['student_id']) : null;

        // Validate payment password first
        $request->validate([
            'paymentPassword' => 'required',
        ]);

        // Check if the payment password is correct
        if (!$student || !Hash::check($request->input('paymentPassword'), $student['password'])) {
            return redirect()->back()->with('error', 'Invalid password. Please try again.');
        }

        // Check if the virtual account exists
        if (!$virtual_account_student_active) {
            return redirect()->back()->with('error', 'No active virtual account found. Please try again.');
        }

        $virtualAccountNumber = $virtual_account_student_active['virtual_account_number'] ?? null;
        $totalAmount = $virtual_account_student_active['total_amount'] ?? null;
        $date = now()->toDateString();

        // Check if the required data is available
        if (!$virtualAccountNumber || !$totalAmount || !$date) {
            return redirect()->back()->with('error', 'Invalid virtual account or total amount data.');
        }

        $postData = [
            'virtual_account_number' => $virtualAccountNumber,
            'transaction_date' => $date,
            'total' => $totalAmount,
        ];

        try {
            $response = Http::post($this->apiUrl . 'api/transactions', $postData);
            return $response->successful()
                ? redirect('/payment/succeed')->with('success', 'Payment successful!')
                : redirect()->back()->with('error', 'Payment failed. Please try again.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred during the payment process. Please try again.');
        }
    }

    public function succeedPayment()
    {
        $transactions = $this->getAllTransactions();
        $transaction = $transactions ? collect($transactions['data'])->last() : null;
        return view('pages.bank-Succeed', compact('transaction'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'account_number' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        return redirect('/bank/home')->with('success', 'Payment processed successfully!');
    }
}
