<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankController extends Controller
{
    public function home()
    {
        return view('pages.bank-Home'); // Returns the login view
    }

    public function payment()
    {
        return view('pages.bank-Payment'); // Returns the login view
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