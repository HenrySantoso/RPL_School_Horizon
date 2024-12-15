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
                        @forelse ($transactions as $index => $transaction)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ data_get($transaction, 'virtual_account.invoice.payment_period.year') }}/{{ data_get($transaction, 'virtual_account.invoice.payment_period.year') + 1 }}
                                </td>
                                <td>{{ data_get($transaction, 'virtual_account.invoice.payment_period.semester') }}</td>
                                <td>{{ number_format(data_get($transaction, 'virtual_account.invoice.total_amount'), 0, ',', '.') }}
                                </td>
                                <td>{{ data_get($transaction, 'transaction_date') }}</td>
                                <td>
                                    @if (data_get($transaction, 'virtual_account.status') === 'Paid')
                                        <span class="badge bg-success"><strong>PAID</strong></span>
                                    @else
                                        <span class="badge bg-danger"><strong>UNPAID</strong></span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No transactions found.</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
