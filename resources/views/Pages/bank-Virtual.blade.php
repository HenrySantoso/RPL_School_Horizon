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

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.6);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 30px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 20px;
        }

        .modal-body p {
            font-size: 16px;
            margin: 12px 0;
        }

        .modal-footer {
            text-align: right;
            margin-top: 20px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 30px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h2 {
                font-size: 22px;
            }

            .modal-content {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Virtual Account Payment</h2>

        <form id="paymentForm" action="/payment/process" method="POST">
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

    <!-- Modal for Invoice Details -->
    <div id="invoiceModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <div class="modal-header">
                <h3>Invoice Details</h3>
            </div>
            <div class="modal-body">
                <p><strong>Name :</strong> {{ $virtual_account['invoice']['student']['name'] }}</p>
                <p><strong>Total Bill:</strong> Rp {{ number_format($virtual_account['invoice']['total_amount'], 0, ',', '.') }}</p>
                <p><strong>Semester:</strong> {{ $virtual_account['invoice']['payment_period']['semester'] }}
                    {{ $virtual_account['invoice']['payment_period']['year'] }}/{{ $virtual_account['invoice']['payment_period']['year'] + 1 }}
                </p>
                <p><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($virtual_account['expired_at'])->format('d F Y H:i:s') }}</p>
                <p><strong>Invoice Reference:</strong> {{ $virtual_account['virtual_account_number'] }}</p>
                <p><strong>Payment Instructions:</strong> Please complete the payment before the due date.</p>
                <div class="mb-3">
                    <label for="paymentPassword" class="form-label">Enter Payment Password</label>
                    <input type="password" class="form-control" id="paymentPassword" name="paymentPassword" required
                        placeholder="Enter your payment password">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-primary" id="payButton">Pay Now</button>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to handle submission and checking virtual account number
        document.getElementById('submitButton').onclick = function() {
            let virtualAccountNumber = document.getElementById('virtualAccountNumber').value;

            // Ensure the Blade variable is properly quoted as a JavaScript string
            let validVirtualAccountNumber = "{{ $virtual_account['virtual_account_number'] }}";

            // Simple check for valid virtual account number
            if (virtualAccountNumber === validVirtualAccountNumber) {
                // Show the modal with the invoice details
                document.getElementById('invoiceModal').style.display = 'block';
            } else {
                // Display error message if virtual account number is not valid
                alert(`Virtual Account ${virtualAccountNumber} is not available`);
            }
        };

        // Close the modal when the user clicks on the close button
        document.getElementById('closeModal').onclick = function() {
            document.getElementById('invoiceModal').style.display = 'none';
        };

        // Close the modal if the user clicks outside of it
        window.onclick = function(event) {
            if (event.target === document.getElementById('invoiceModal')) {
                document.getElementById('invoiceModal').style.display = 'none';
            }
        };

        // Handle Pay Now button click
        document.getElementById('payButton').onclick = function() {
            // Perform payment logic (e.g., form submission or API call)
            alert('Payment processed successfully!');
            // document.getElementById('invoiceModal').style.display = 'none'; // Close modal after payment
            window.location.href = '/bank/payment/virtual/succeed';
        }
    </script>
</body>

</html>
