<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function generateInvoice()
    {
        // Sample data for the invoice (replace with actual data)
        $data = [
            'name' => 'Henry Yohanes Santoso',
            'courses' => [
                ['code' => 'SE4323', 'name' => 'DATA MINING', 'group' => 'A', 'credits' => 3, 'price' => 3.0],
                ['code' => 'SI2413', 'name' => 'REKAYASA PERANGKAT LUNAK', 'group' => 'B', 'credits' => 3, 'price' => 2.0],
                ['code' => 'PR2413', 'name' => 'PRAKTIKUM REKAYASA PERANGKAT LUNAK', 'group' => 'A', 'credits' => 3, 'price' => 3.0],
                // Add all your courses here...
            ],
            'fixed_cost' => 2600000,
            'variable_cost' => 5400000,
            'health' => 165000,
            'total' => 8330000,
            'subsidi' => 600000,
            'total_due' => 2330000
        ];

        // Generate the PDF from the view
        $pdf = PDF::loadView('invoice', $data);

        // Download the PDF as invoice.pdf
        return $pdf->download('invoice.pdf');
    }
}
