<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Account Payment</title>
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

        /* Form Styles */
        .form-label {
            font-size: 14px;
            font-weight: bold;
            color: #444;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
        }

        .btn-primary {
            display: inline-block;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            display: inline-block;
            background-color: #6c757d;
            color: white;
            font-size: 16px;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h2 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Virtual Account Payment</h2>

        <form id="paymentForm">
            <!-- Add CSRF Token for Laravel -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <!-- Display Account Info -->
            <div class="mb-3">
                <label class="form-label">Rekening Number</label>
                <input type="text" class="form-control" value="{{ $student['student_id'] }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Saldo</label>
                <input type="text" class="form-control" value="{{ $student['balance'] }}" disabled>
            </div>

            <!-- Virtual Account Number Input -->
            <div class="mb-3">
                <label for="virtualAccountNumber" class="form-label">Enter Virtual Account Number</label>
                <input type="text" class="form-control" id="virtualAccountNumber" name="virtualAccountNumber"
                    required placeholder="Enter your virtual account number">
            </div>

            <!-- Submit Button -->
            <button type="button" class="btn-primary" id="submitButton">Submit Virtual Account</button>

            <!-- Back Button -->
            <a href="/bank/payment" class="btn-secondary" style="margin-left: 10px;">Back</a>
        </form>
    </div>

    <script>
        // JavaScript to handle submission and checking virtual account number
        document.getElementById('submitButton').onclick = function () {
            let virtualAccountNumber = document.getElementById('virtualAccountNumber').value;

            // Ensure the Blade variable is properly quoted as a JavaScript string
            let validVirtualAccountNumber = "{{ $virtual_account_student_active['virtual_account_number'] }}";

            // Simple check for valid virtual account number
            if (virtualAccountNumber === validVirtualAccountNumber) {
                // Redirect to the virtual details page
                window.location.href = '/bank/payment/virtualDetails';
            } else {
                // Display error message if virtual account number is not valid
                alert(`Virtual Account ${virtualAccountNumber} is not available`);
            }
        };
    </script>
</body>

</html>
