@extends('layouts.student-layout')
@section('title', 'Invoice & Payment')

@section('content')
<div class="container mt-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>INVOICE</h4>
        <a href="{{ route('generate-invoice') }}" class="btn btn-primary">
            <i class="bi bi-printer"></i> INVOICE PDF
        </a>
    </div>

    <!-- User Information Table -->
    <div class="mb-4">
        <table class="table table-bordered text-center">
            <thead class="table-light">
                <tr>
                    <th><i class="bi bi-person-circle"></i> Name</th>
                    <th><i class="bi bi-credit-card"></i> Virtual Account</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Henry Yohanes Santoso / 72220543</td>
                    <td>123456789012345</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Payment Data Table -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <strong>PAYMENT DATA</strong>
        </div>
        <div class="card-body">
            <table id="dataPembayaranTable" class="table table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>NO.</th>
                        <th>ACADEMIC YEAR</th>
                        <th>SEMESTER</th>
                        <th>TOTAL BILL (Rp)</th>
                        <th>PAYMENT DATE</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2024/2025</td>
                        <td>ODD</td>
                        <td>10,200,000</td>
                        <td></td>
                        <td class="text-danger"><strong>NOT PAID</strong></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2023/2024</td>
                        <td>EVEN</td>
                        <td>8,100,000</td>
                        <td>2024-05-01 17:42:14</td>
                        <td class="text-success"><strong>PAID</strong></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2023/2024</td>
                        <td>ODD</td>
                        <td>11,850,000</td>
                        <td>2023-11-20 19:42:14</td>
                        <td class="text-success"><strong>PAID</strong></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>2022/2023</td>
                        <td>EVEN</td>
                        <td>9,175,000</td>
                        <td>2023-05-11 12:42:14</td>
                        <td class="text-success"><strong>PAID</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
