@extends('layouts.student-layout')
@section('title', 'Invoice & Payment')

@section('content')
<div class="container mt-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-primary"><i class="bi bi-receipt"></i> Invoice & Payment</h4>
        <a href="{{ route('generate-invoice') }}" class="btn btn-outline-primary">
            <i class="bi bi-printer"></i> Download Invoice PDF
        </a>
    </div>

    <!-- User Information Section -->
    <div class="mb-4">
        <div class="card">
            <div class="card-header bg-warning">
                <strong><i class="bi bi-person-circle"></i> Student Virtual Account</strong>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Student Name</th>
                            <th>Virtual Account</th>
                            <th>Semester</th>
                            <th>Academic Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Henry Yohanes Santoso / 72220543</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <span id="virtualAccount">123456789012345</span>
                                    <button class="btn btn-outline-secondary btn-sm ms-2" onclick="copyToClipboard('virtualAccount')">
                                        <i class="bi bi-clipboard"></i> Copy
                                    </button>
                                </div>
                            </td>
                            <td>ODD</td> <!-- Replace with dynamic semester data -->
                            <td>2024/2025</td> <!-- Replace with dynamic academic year data -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Invoice Detail Section -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <strong><i class="bi bi-credit-card"></i> Invoice Details</strong>
        </div>
        <div class="card-body">
            <table id="dataPembayaranTable" class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th class="text-start text-center">Bill Type</th>
                        <th class="text-end text-center">Price (IDR)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-start">Fix Cost</td>
                        <td class="text-end">3,000,000</td>
                    </tr>
                    <tr>
                        <td class="text-start">Variable Cost (24 x 200,000)</td>
                        <td class="text-end">4,800,000</td>
                    </tr>
                    <tr>
                        <td class="text-start">Late Charge</td>
                        <td class="text-end">200,000</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-start">Total</th>
                        <th class="text-end"><strong>8,000,000</strong></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Pay Now Section -->
    <div class="text-center">
        <a href="/loginBank" class="btn btn-success btn-lg">
            <i class="bi bi-wallet2"></i> Pay Now
        </a>
    </div>
</div>

<!-- JavaScript for Copy to Clipboard -->
<script>
    function copyToClipboard(elementId) {
        const element = document.getElementById(elementId);
        const textToCopy = element.innerText || element.textContent;
        navigator.clipboard.writeText(textToCopy).then(() => {
            alert('Virtual Account copied to clipboard!');
        }).catch((error) => {
            console.error('Failed to copy: ', error);
            alert('Failed to copy Virtual Account.');
        });
    }
</script>
@endsection
