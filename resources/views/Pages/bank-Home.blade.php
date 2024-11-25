@extends('layouts.bank-layout')
@section('title', 'Bank Home')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Hello, Henry!</h4>

    <!-- Student Details Section -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            <strong>User Information</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th class="w-25">No Rekening</th>
                        <td>72220543</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>Henry Yohanes Santoso</td>
                    </tr>
                    <tr>
                        <th>Saldo</th>
                        <td>Rp 10.000.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
