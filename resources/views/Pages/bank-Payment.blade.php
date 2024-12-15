@extends('layouts.bank-layout')
@section('title', 'Bank Payment')

@section('content')
    <style>
        .catalog-img {
            width: 100%;
            height: auto;
            max-height: 150px;
            object-fit: cover;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }

        .btn {
            margin-top: auto;
        }
    </style>

    <div class="container mt-5">
        <h2 class="text-center text-primary">Transfer</h2>
        <!-- Payment Types Catalog -->
        <div class="mb-3">
            <label class="form-label text-info font-weight-bold">Choose Transfer Method</label>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                <!-- Between BCA Accounts -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <i class="fas fa-university me-2"></i>
                            <strong>Between BCA Accounts</strong>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('images/bca-logo.png') }}" alt="BCA" class="catalog-img">
                            <p>Transfer money to another BCA account quickly and securely.</p>
                            <button type="radio" name="payment_method" value="antar_rekening_bca" class="btn btn-outline-primary">
                                Select
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Between Banks -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-success text-white">
                            <i class="fas fa-exchange-alt me-2"></i>
                            <strong>Between Banks</strong>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('images/another_bank.png') }}" alt="Another Bank" class="catalog-img">
                            <p>Transfer money to another bank account in Indonesia.</p>
                            <button type="radio" name="payment_method" value="antar_bank" class="btn btn-outline-success">
                                Select
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Transfer to Sakuku -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-info text-white">
                            <i class="fas fa-wallet me-2"></i>
                            <strong>Transfer to Sakuku</strong>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('images/sakuku_bank.jpeg') }}" alt="Sakuku" class="catalog-img">
                            <p>Send money directly to the Sakuku digital wallet.</p>
                            <button type="radio" name="payment_method" value="transfer_sakuku" class="btn btn-outline-info">
                                Select
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Foreign Exchange Transfer -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-warning text-white">
                            <i class="fas fa-globe me-2"></i>
                            <strong>Foreign Exchange Transfer</strong>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('images/foreign_bank.png') }}" alt="Foreign Exchange" class="catalog-img">
                            <p>Transfer money to overseas accounts with foreign currencies.</p>
                            <button type="radio" name="payment_method" value="transfer_valas" class="btn btn-outline-warning">
                                Select
                            </button>
                        </div>
                    </div>
                </div>

                <!-- BCA Virtual Account -->
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-dark text-white">
                            <i class="fas fa-credit-card me-2"></i>
                            <strong>BCA Virtual Account</strong>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('images/virtual_bank.jpeg') }}" alt="Virtual Account" class="catalog-img">
                            <p>Pay through a unique Virtual Account number generated by BCA.</p>
                            <a href="/bank/payment/virtual" class="btn btn-outline-dark">
                                Select
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
