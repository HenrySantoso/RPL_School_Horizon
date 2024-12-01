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
}
