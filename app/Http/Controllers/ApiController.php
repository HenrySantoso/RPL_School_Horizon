<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Import Http Facade

class ApiController extends Controller
{
    public function getApiData()
    {
        // Define the API URL
        $apiUrl = 'https://40cd-114-10-151-180.ngrok-free.app/test';

        // Perform the GET request
        $response = Http::get($apiUrl);

        // Check if the request was successful
        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            // Handle errors
            return response()->json([
                'error' => 'Unable to fetch data',
                'status' => $response->status(),
                'body' => $response->body(),
            ], $response->status());
        }
    }

    public function getCategory()
    {
        $response = Http::get(env('API_URL') . '/Categories');
        // $response = Http::get('https://actualbackendapp.azurewebsites.net/api/v1/Categories');

        if ($response->successful()) {
            // Use the response directly as data
            $categories = $response->json();
        } else {
            // Fallback in case of an error
            $categories = [];
        }

        // Pass data to the Blade view
        return view('test', ['categories' => $categories]);
    }
}
