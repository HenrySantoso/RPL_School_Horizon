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

        table th,
        table td {
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

        .table-header {
            font-weight: bold;
        }

        .table-total {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>

<body>
    <h3 align="center">NEW INVOICE</h3>
    @if ($virtual_account_student_active && $invoice && $student)
        <div
            style="margin-bottom: 20px; padding: 15px; background-color: #fff; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); border-radius: 8px;">
            <div
                style="font-weight: bold; padding: 10px; background-color: #f8c200; color: #fff; border-radius: 8px 8px 0 0;">
                HORIZON UNIVERSITY
            </div>
            <div style="font-weight: bold; padding: 10px;">
                <span style="font-weight: normal;">Payment Semester:
                    {{ $invoice['payment_period']['semester'] }}</span>
                <br>
                <br>
                <span style="font-weight: normal;">Payment Year:
                    {{ $invoice['payment_period']['year'] }}/{{ $invoice['payment_period']['year'] + 1 }}</span>
            </div>
            <div style="font-weight: bold; padding: 10px;">
                <span style="font-weight: normal;">Student's Major: {{ $student['major'] }}</span>

            </div>
            <div style="font-weight: bold; padding: 10px;">
                <span style="font-weight: normal;">Student's Name:
                    {{ $virtual_account_student_active['invoice']['student']['name'] }}</span>

            </div>
        </div>


        <div class="section">
            <div class="section-header header-blue">BILL</div>
            <table>
                <tr>
                    <td class="table-header">Fixed Cost</td>
                    <td class="text-right">{{ number_format($invoice['payment_period']['fixed_cost'], 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td class="table-header">Administration Cost</td>
                    <td class="text-right">{{ number_format($invoice['payment_period']['credit_cost'], 0, ',', '.') }}
                    </td>
                </tr>
                <!-- Additional costs based on invoice items -->
                @foreach ($virtual_account_student_active['invoice']['invoice_items'] as $item)
                    <tr>
                        <td class="table-header">{{ $item['description'] }}</td>
                        <td class="text-right">{{ number_format($item['price'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="section">
            <table>
                <tr>
                    <th>TOTAL</th>
                    <td class="text-right">
                        {{ number_format($virtual_account_student_active['invoice']['total_amount'], 0, ',', '.') }}
                    </td>
                </tr>
            </table>
        </div>
        {{-- You can add additional sections like payment instructions here --}}
        <div style="padding: 10px;">
            <p class="text-muted">Please complete the payment before <strong>{{ \Carbon\Carbon::parse($virtual_account_student_active['expired_at'])->format('d F Y, h:i A') }}</strong></p>
        </div>
    @else
        <div class="section">
            <p>Invoice not found.</p>
        </div>
    @endif
</body>

</html>
