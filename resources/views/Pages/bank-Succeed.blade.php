<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Successful</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .header {
            text-align: left;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
        }

        .header h3 {
            color: #007bff;
            margin-top: 10px;
            margin-bottom: 0;
            font-size: 18px;
        }

        .amount {
            background-color: #007bff;
            color: white;
            font-size: 24px;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .details {
            text-align: left;
            line-height: 1.6;
            font-size: 14px;
        }

        .details .label {
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #555;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            {{-- <img src="{{ asset('images/bca-logo-white.png') }}" alt="BCA Logo" align="center"> --}}
            <h3 align="center">Payment Successful</h3>
        </div>

        <div class="amount">
            Rp {{ number_format($transaction['total'], 0, ',', '.') }}
        </div>

        <div class="details">
            <p><strong class="label">Account Number </strong>: {{ $transaction['virtual_account']['invoice']['student']['student_id'] }}</p>
            <p><strong class="label">Payment Type </strong>: Virtual Account</p>
            <p><strong class="label">Institution </strong>: {{ $transaction['virtual_account']['invoice']['payment_period']['institution']['name'] }}</p>
            <p><strong class="label">Transaction Date </strong>: {{ $transaction['transaction_date'] }}</p>
            <p><strong class="label">Transaction Time </strong>: {{ \Carbon\Carbon::parse($transaction['created_at'])->format('H:i:s') }}</p>
            <p><strong class="label">Virtual Account </strong>: {{ $transaction['virtual_account']['virtual_account_number'] }}</p>
            <p><strong class="label">Name </strong>: {{ $transaction['virtual_account']['invoice']['student']['name'] }}</p>
            <p><strong class="label">Major </strong>: {{ $transaction['virtual_account']['invoice']['student']['major'] }}</p>
            <p><strong class="label">Period </strong>:
                {{ $transaction['virtual_account']['invoice']['payment_period']['semester'] }}
                {{ $transaction['virtual_account']['invoice']['payment_period']['year'] }} /
                {{ $transaction['virtual_account']['invoice']['payment_period']['year'] + 1 }}
            </p>
            <p><strong class="label">Details :</strong></p>
            <ul style="margin: 0; padding-left: 20px;">
                <li>Fixed Cost :
                    {{ number_format($transaction['virtual_account']['invoice']['payment_period']['fixed_cost'], 0, ',', '.') }}
                </li>
                <li>Credit Cost :
                    {{ number_format($transaction['virtual_account']['invoice']['payment_period']['credit_cost'], 0, ',', '.') }}
                </li>
                @foreach ($transaction['virtual_account']['invoice']['invoice_items'] as $item)
                    <li>{{ $item['description'] }} : {{ number_format($item['price'], 0, ',', '.') }}</li>
                @endforeach
            </ul>
        </div>
        <a href="/bank/account" class="back-button">Back to Account</a>
    </div>
</body>

</html>
