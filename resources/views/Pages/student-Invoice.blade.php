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
                    @if ($invoice)
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
                                    <td>{{ $invoice['student']['name'] }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            @if ($virtual_account)
                                                <span id="virtualAccount">{{ $virtual_account['virtual_account_number'] }}</span>
                                                <button class="btn btn-outline-secondary btn-sm ms-2"
                                                    onclick="copyToClipboard('virtualAccount')">
                                                    <i class="bi bi-clipboard"></i> Copy
                                                </button>
                                            @else
                                                <span class="text-danger">No Virtual Account Found</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $invoice['payment_period']['semester'] }}</td>
                                    <td>{{ $invoice['payment_period']['year'] }}/{{ $invoice['payment_period']['year'] + 1 }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <p class="text-danger">No invoice found for this student.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Invoice Detail Section -->
        @if ($invoice)
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
                            <!-- Display fixed cost and credit cost -->
                            <tr>
                                <td>Fixed Cost</td>
                                <td class="text-end">{{ number_format($invoice['payment_period']['fixed_cost'], 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Credit Cost</td>
                                <td class="text-end">{{ number_format($invoice['payment_period']['credit_cost'], 0, ',', '.') }}</td>
                            </tr>
                            <!-- Display invoice items -->
                            @if (!empty($invoice['invoice_items']))
                                @foreach ($invoice['invoice_items'] as $item)
                                    <tr>
                                        <td class="text-start">{{ $item['description'] }}</td>
                                        <td class="text-end">{{ number_format($item['price'], 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2" class="text-center text-danger">No invoice items found.</td>
                                </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-start">Total</th>
                                <th class="text-end">
                                    <strong>{{ number_format($invoice['total_amount'], 0, ',', '.') }}</strong>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        @endif

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
            if (element) {
                const textToCopy = element.innerText || element.textContent;
                navigator.clipboard.writeText(textToCopy)
                    .then(() => {
                        alert('Virtual Account copied to clipboard!');
                    })
                    .catch((error) => {
                        console.error('Failed to copy: ', error);
                        alert('Failed to copy Virtual Account.');
                    });
            } else {
                alert('Element not found!');
            }
        }
    </script>
@endsection
