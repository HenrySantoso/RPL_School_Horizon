@extends('layouts.bank-layout')
@section('title', 'Bank Payment')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center text-primary">Payment</h2>
        <!-- Payment Types Catalog -->
        <div class="mb-3">
            <label class="form-label text-info font-weight-bold">Choose Payment Method</label>
            <div class="row">
                <!-- BCA Online Banking -->
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <strong>BCA Online Banking (KlikPay)</strong>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ asset('images/online_banking.jpg') }}" alt="BCA Online Banking"
                                class="img-fluid mb-3" style="max-height: 150px;">
                            <p>Pay through your BCA online banking account (KlikPay).</p>
                            <button type="radio" name="payment_method" value="online_banking"
                                class="btn btn-outline-primary">
                                Select
                            </button>
                        </div>
                    </div>
                </div>

                <!-- BCA Mobile Banking -->
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-success text-white">
                            <strong>BCA Mobile Banking</strong>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ asset('images/mobile_banking.jpg') }}" alt="BCA Mobile Banking"
                                class="img-fluid mb-3" style="max-height: 150px;">
                            <p>Pay using the BCA mobile app on your phone.</p>
                            <button type="radio" name="payment_method" value="mobile_banking"
                                class="btn btn-outline-success">
                                Select
                            </button>
                        </div>
                    </div>
                </div>

                <!-- BCA ATM Payments -->
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-info text-white">
                            <strong>BCA ATM Payments</strong>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ asset('images/atm_payment.jpg') }}" alt="BCA ATM Payments" class="img-fluid mb-3"
                                style="max-height: 150px;">
                            <p>Make payments using your BCA ATM card.</p>
                            <button type="radio" name="payment_method" value="atm_payment" class="btn btn-outline-info">
                                Select
                            </button>
                        </div>
                    </div>
                </div>

                <!-- BCA Virtual Account -->
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-warning text-white">
                            <strong>BCA Virtual Account</strong>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ asset('images/virtual_account.jpg') }}" alt="BCA Virtual Account"
                                class="img-fluid mb-3" style="max-height: 150px;">
                            <p>Pay through a unique Virtual Account number generated by BCA.</p>
                            <a href="/bank/payment/virtual" class="btn btn-outline-warning">
                                Select
                            </a>
                        </div>
                    </div>
                </div>

                <!-- BCA Credit Card -->
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-danger text-white">
                            <strong>BCA Credit Card</strong>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ asset('images/credit_card.jpg') }}" alt="BCA Credit Card" class="img-fluid mb-3"
                                style="max-height: 150px;">
                            <p>Pay using your BCA Credit Card.</p>
                            <button type="radio" name="payment_method" value="credit_card" class="btn btn-outline-danger">
                                Select
                            </button>
                        </div>
                    </div>
                </div>

                <!-- BCA Debit Card -->
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-secondary text-white">
                            <strong>BCA Debit Card</strong>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ asset('images/debit_card.jpg') }}" alt="BCA Debit Card" class="img-fluid mb-3"
                                style="max-height: 150px;">
                            <p>Use your BCA Debit Card for online or in-store payments.</p>
                            <button type="radio" name="payment_method" value="debit_card"
                                class="btn btn-outline-secondary">
                                Select
                            </button>
                        </div>
                    </div>
                </div>

                <!-- BCA QRIS -->
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-dark text-white">
                            <strong>BCA QRIS</strong>
                        </div>
                        <div class="card-body text-center">
                            <img src="{{ asset('images/qris_payment.jpg') }}" alt="BCA QRIS" class="img-fluid mb-3"
                                style="max-height: 150px;">
                            <p>Pay via QR code using the BCA mobile app (QRIS).</p>
                            <button type="radio" name="payment_method" value="qris" class="btn btn-outline-dark">
                                Select
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
