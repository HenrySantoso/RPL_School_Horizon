<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Account Details</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }

        .details {
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .details p {
            margin: 10px 0;
        }

        .details strong {
            display: inline-block;
            width: 180px;
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .button-group {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
        }

        .btn {
            display: inline-block;
            font-size: 16px;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .alert-error {
            color: #721c24;
            /* Darker red for text */
            background-color: #f8d7da;
            /* Soft pinkish background */
            border-color: #f5c6cb;
            /* Light border */
            border-radius: 0.375rem;
            /* Rounded corners */
            padding: 1rem;
            /* Spacious padding */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Subtle shadow for depth */
            font-weight: 500;
            /* Slightly bolder text for emphasis */
            transition: all 0.3s ease-in-out;
            /* Smooth transition for hover effect */
        }

        .alert-error:hover {
            background-color: #f1b0b7;
            /* Slightly darker background on hover */
            border-color: #f1a0a6;
            /* Darker border color on hover */
            transform: translateY(-2px);
            /* Slight lift effect on hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Virtual Account Payment Details</h2>
        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif


        <div class="details">
            <p><strong>Name</strong>: {{ $virtual_account_student_active['invoice']['student']['name'] }}</p>
            <p><strong>Total Bill</strong>: Rp
                {{ number_format($virtual_account_student_active['invoice']['total_amount'], 0, ',', '.') }}</p>
            <p><strong>Semester</strong>: {{ $virtual_account_student_active['invoice']['payment_period']['semester'] }}
                {{ $virtual_account_student_active['invoice']['payment_period']['year'] }}/{{ $virtual_account_student_active['invoice']['payment_period']['year'] + 1 }}
            </p>
            <p><strong>Due Date</strong>:
                {{ \Carbon\Carbon::parse($virtual_account_student_active['expired_at'])->format('d F Y H:i:s') }}</p>
            <p><strong>Virtual Account Number</strong>: {{ $virtual_account_student_active['virtual_account_number'] }}</p>
            <p><strong>Payment Instructions</strong>: Please complete the payment before the due date.</p>
        </div>

        <form action="/payment/complete" method="POST">
            <!-- CSRF Token -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- Password Input -->
            <div class="form-group">
                <label for="paymentPassword">Enter Payment Password:</label>
                <input type="password" id="paymentPassword" name="paymentPassword" required
                    placeholder="Enter your payment password">
            </div>

            <!-- Button Group -->
            <div class="button-group">
                <button type="submit" class="btn btn-primary">Pay Now</button>
                <a href="/bank/payment" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>

</body>

</html>
