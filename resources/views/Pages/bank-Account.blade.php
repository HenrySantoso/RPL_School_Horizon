@extends('layouts.bank-layout')
@section('title', 'Bank Home')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Hello, Henry!</h4>

    <!-- User Information Section -->
    <div class="row g-4">
        <!-- No Rekening -->
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-header bg-primary text-white">
                    <strong>No Rekening</strong>
                </div>
                <div class="card-body">
                    <p class="fs-4 mb-0">72220543</p>
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
                    <p class="fs-4 mb-0">Henry Yohanes Santoso</p>
                </div>
            </div>
        </div>

        <!-- Saldo -->
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <strong>Saldo</strong>
                </div>
                <div class="card-body">
                    <p class="fs-4 mb-0">Rp 10.000.000</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
