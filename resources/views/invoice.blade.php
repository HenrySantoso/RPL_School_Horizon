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
            padding: 20px;
            background-color: #f9f9f9;
        }
        .section {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .section-header {
            font-weight: bold;
            padding: 10px;
            color: #fff;
            border-radius: 8px 8px 0 0;
        }
        .header-yellow {
            background-color: #f8c200;
        }
        .header-blue {
            background-color: #17a2b8;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table th, table td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #f4f4f4;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="section">
        <div class="section-header header-yellow">Student Virtual Account</div>
        <table>
            <tr>
                <th>Student Name</th>
                <td>Henry Yohanes</td>
            </tr>
            <tr>
                <th>Virtual Account</th>
                <td>123123123</td>
            </tr>
            <tr>
                <th>Semester</th>
                <td>GANJIL</td>
            </tr>
            <tr>
                <th>Academic Year</th>
                <td>2023/2024</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <div class="section-header header-blue">Invoice Details</div>
        <table>
            <thead>
                <tr>
                    <th>Bill Type</th>
                    <th class="text-right">Price (IDR)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Fixed Cost</td>
                    <td class="text-right">3,500,000</td>
                </tr>
                <tr>
                    <td>Credit Cost</td>
                    <td class="text-right">300,000</td>
                </tr>
                <tr>
                    <td>Biaya ICE</td>
                    <td class="text-right">240</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <th class="text-right">2,300,000</th>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
