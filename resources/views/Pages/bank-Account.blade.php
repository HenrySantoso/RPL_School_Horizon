@extends('layouts.bank-layout')
@section('title', 'Bank Account')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Hello, {{ $student['name'] }}!</h4>

    <!-- User Information Section -->
    <div class="row g-4">
        <!-- No Rekening -->
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-header bg-primary text-white">
                    <strong>Account Number</strong>
                </div>
                <div class="card-body">
                    <p class="fs-4 mb-0">{{ $student['student_id'] }}</p>
                </div>
            </div>
        </div>

        <!-- Name -->
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-header bg-success text-white">
                    <strong>Name</strong>
                </div>
                <div class="card-body">
                    <p class="fs-4 mb-0">{{ $student['name'] }}</p>
                </div>
            </div>
        </div>

        <!-- Saldo -->
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <strong>Balance (IDR)</strong>
                </div>
                <div class="card-body">
                    <p class="fs-4 mb-0">{{ number_format($student['balance'], 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Transactions Section -->
    <div class="col-md-12 mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <strong>Recent Transactions</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Transaction Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2024-12-03</td>
                            <td>Rp 500.000</td>
                            <td>Success</td>
                            <td>Deposit</td>
                        </tr>
                        <tr>
                            <td>2024-12-01</td>
                            <td>Rp 200.000</td>
                            <td>Failed</td>
                            <td>Withdrawal</td>
                        </tr>
                        <!-- Add more transactions here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Outstanding Payments Section -->
    {{-- <div class="col-md-6 mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-danger text-white">
                <strong>Outstanding Payments</strong>
            </div>
            <div class="card-body">
                <p class="fs-4 mb-0">Invoice #INV-123456789 - Rp 1.500.000</p>
                <p class="mb-0">Due Date: 2024-12-15</p>
                <a href="#" class="btn btn-primary mt-2">Pay Now</a>
            </div>
        </div>
    </div> --}}

    <!-- Quick Actions Section -->
    <div class="col-md-12 mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <strong>Quick Actions</strong>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <a href="#" class="btn btn-info">Transfer Funds</a>
                    <a href="#" class="btn btn-warning">Top Up</a>
                    <a href="#" class="btn btn-success">View Invoice</a>
                    <a href="#" class="btn btn-danger">Make Payment</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Account Security Tips Section -->
    <div class="col-md-12 mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <strong>Account Security Tips</strong>
            </div>
            <div class="card-body">
                <ul>
                    <li>Change your password regularly</li>
                    <li>Enable Two-Factor Authentication (2FA)</li>
                    <li>Monitor your account activity frequently</li>
                    <li>Use strong and unique passwords</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
