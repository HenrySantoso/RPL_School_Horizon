@extends('layouts.bank-layout')
@section('title', 'Bank Payment')

@section('content')
    <div class="container mt-5">
        <h2>Payment</h2>

        <form action="{{ route('payment.process') }}" method="POST">
            @csrf

            <!-- Virtual Account Input -->
            <div class="mb-3">
                <label for="virtualAccount" class="form-label">Virtual Account Number</label>
                <input type="text" class="form-control" id="virtualAccount" name="virtualAccount" required
                    placeholder="Enter your virtual account number">
            </div>

            <!-- Password Input -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required
                    placeholder="Enter your password">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit Payment</button>
        </form>
    </div>
@endsection
