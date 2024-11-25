@extends('layouts.student-layout')
@section('title', 'Invoice & Pembayaran')

@section('content')
<div class="container mt-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>INVOICE & PEMBAYARAN</h4>
        <button class="btn btn-primary"><i class="bi bi-printer"></i> CETAK INVOICE</button>
    </div>
    <div class="mb-4">
        <p><i class="bi bi-person-circle"></i> HENRY YOHANES SANTOSO / 72220543</p>
        <p><i class="bi bi-credit-card"></i> <strong>Virtual Account:</strong> 123456789012345</p>
    </div>

    <!-- Data Pembayaran Table -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <strong>DATA PEMBAYARAN SPP</strong>
        </div>
        <div class="card-body">
            <table id="dataPembayaranTable" class="table table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>NO.</th>
                        <th>TAHUN AKADEMIK</th>
                        <th>SEMESTER</th>
                        <th>SKS</th>
                        <th>BIAYA SKS (Rp)</th>
                        <th>TAGIHAN (Rp)</th>
                        <th>DENDA (Rp)</th>
                        <th>TOTAL TAGIHAN (Rp)</th>
                        {{-- <th>TOTAL BAYAR (Rp)</th> --}}
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2024/2025</td>
                        <td>GANJIL</td>
                        <td>20</td>
                        <td>200,000</td>
                        <td>10,000,000</td>
                        <td>200,000</td>
                        <td>10,200,000</td>
                        <td class="text-danger"><strong>BELUM LUNAS</strong></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2023/2024</td>
                        <td>GENAP</td>
                        <td>18</td>
                        <td>200,000</td>
                        <td>8,100,000</td>
                        <td>0</td>
                        <td>8,100,000</td>
                        <td class="text-success"><strong>LUNAS</strong></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2023/2024</td>
                        <td>GANJIL</td>
                        <td>22</td>
                        <td>200,000</td>
                        <td>11,550,000</td>
                        <td>300,000</td>
                        <td>11,850,000</td>
                        <td class="text-success"><strong>LUNAS</strong></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>2022/2023</td>
                        <td>GENAP</td>
                        <td>19</td>
                        <td>200,000</td>
                        <td>9,025,000</td>
                        <td>150,000</td>
                        <td>9,175,000</td>
                        <td class="text-success"><strong>LUNAS</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize DataTables
        new DataTable('#dataPembayaranTable', {
            responsive: true, // Optional: Make the table responsive
            paging: true, // Enable pagination
            ordering: true, // Enable column sorting
            search: true, // Enable search functionality
            language: {
                search: "Cari:", // Customize the search input placeholder
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                zeroRecords: "Data tidak ditemukan",
                info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                infoEmpty: "Tidak ada data yang tersedia",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                }
            }
        });
    });
</script> --}}
@endsection
