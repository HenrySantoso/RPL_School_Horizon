@extends('layouts.student-layout')
@section('title', 'Transaction List')

@section('content')
<div class="container mt-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-primary"><i class="bi bi-list-check"></i> Transaction List</h4>
    </div>

    <!-- Transaction List Table -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <strong><i class="bi bi-cash-stack"></i> TUITION PAYMENT DATA</strong>
        </div>
        <div class="card-body">
            <table id="dataPembayaranTable" class="table table-striped table-hover text-center">
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
                        <td>2</td>
                        <td>2023/2024</td>
                        <td>EVEN</td>
                        <td>8,100,000</td>
                        <td>2024-05-01 17:42:14</td>
                        <td><span class="badge bg-success"><strong>PAID</strong></span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2023/2024</td>
                        <td>ODD</td>
                        <td>11,850,000</td>
                        <td>2023-11-20 19:42:14</td>
                        <td><span class="badge bg-success"><strong>PAID</strong></span></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>2022/2023</td>
                        <td>EVEN</td>
                        <td>9,175,000</td>
                        <td>2023-05-11 12:42:14</td>
                        <td><span class="badge bg-success"><strong>PAID</strong></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
