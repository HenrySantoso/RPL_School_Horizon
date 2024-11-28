<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-width: 100px;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
        }
        .details, .courses, .costs {
            margin-bottom: 20px;
        }
        .courses th, .courses td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        .courses th {
            text-align: left;
            background-color: #f4f4f4;
        }
        .costs table {
            width: 100%;
            margin-top: 10px;
        }
        .costs th, .costs td {
            padding: 8px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('images/horizon-logo.png') }}" alt="University Logo">
            <h1>HORIZON UNIVERSITY</h1>
            <p>Invoice Registrasi Gasal 2024/2025</p>
        </div>

        <div class="details">
            <p><strong>Prodi:</strong> Sistem Informasi</p>
            <p><strong>Nama:</strong> {{ $name }}</p>
            <p><strong>NRP:</strong> 72220543</p>
        </div>

        <div class="courses">
            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>Grup</th>
                        <th>Sks</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{ $course['code'] }}</td>
                        <td>{{ $course['name'] }}</td>
                        <td>{{ $course['group'] }}</td>
                        <td>{{ $course['credits'] }}</td>
                        <td>{{ $course['price'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="costs">
            <table>
                <tr>
                    <th>Total Sks</th>
                    <td>{{ $total }}</td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td>{{ $variable_cost }}</td>
                </tr>
                <tr>
                    <th>Biaya Tetap</th>
                    <td>{{ $fixed_cost }}</td>
                </tr>
                <tr>
                    <th>Biaya Kesehatan</th>
                    <td>{{ $health }}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>{{ $total }}</td>
                </tr>
                <tr>
                    <th>Subsidi MBKM/MSIB</th>
                    <td>{{ $subsidi }}</td>
                </tr>
                <tr>
                    <th>Total Tagihan</th>
                    <td>{{ $total_due }}</td>
                </tr>
            </table>
        </div>

        <div class="footer">
            <p>Yogyakarta, {{ now()->format('d/m/Y') }}</p>
            <p>Biro Administrasi Akademik</p>
        </div>
    </div>
</body>
</html>
