<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        return view('pages.student-Dashboard');
    }

    public function invoice()
    {
        return view('pages.student-Invoice');
    }
}
