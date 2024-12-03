<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankController extends Controller
{
    public function account()
    {
        return view('pages.bank-Account'); // Returns the login view
    }

    public function payment()
    {
        return view('pages.bank-Payment'); // Returns the login view
    }

    public function virtual()
    {
        return view('pages.bank-Virtual'); // Returns the login view
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
