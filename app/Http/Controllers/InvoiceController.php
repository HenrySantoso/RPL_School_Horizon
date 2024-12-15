<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        //$this->apiUrl = env('API_BASE_URL', 'https://stud-upright-skunk.ngrok-free.app/');
        //$this->apiUrl = env('API_BASE_URL', 'https://easily-pleasant-mustang.ngrok-free.app//');
        $this->apiUrl = env('API_BASE_URL', 'http://127.0.0.1:3000/');
    }

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

    public function generateInvoice()
    {

        // Generate the PDF from the view
        $pdf = PDF::loadView('invoice', $data);

        // Download the PDF as invoice.pdf
        return $pdf->download('invoice.pdf');
    }
}
