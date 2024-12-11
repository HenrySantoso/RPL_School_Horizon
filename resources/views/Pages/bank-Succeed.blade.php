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
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Bank_BNI_logo.svg/1200px-Bank_BNI_logo.svg.png" alt="BCA Logo">
            <h3 align="center">Payment Successful</h3>
        </div>

        <div class="amount">
            Rp 2.300.000
        </div>

        <div class="details">
            <p><span class="label">Account Number       :</span> 72220001</p>
            <p><span class="label">Payment Type         :</span> Virtual Account</p>
            <p><span class="label">Institution          :</span> Hudson Group</p>
            <p><span class="label">Transaction Date     :</span> 11-12-2024</p>
            <p><span class="label">Transaction Time     :</span> 13:44:23 </p>
            <p><span class="label">Virtual Account      :</span> 123123123</p>
            <p><span class="label">Nama                 :</span> Henry Yohanes</p>
            <p><span class="label">Major                :</span> Information System</p>
            <p><span class="label">Period               :</span> GANJIL 2023/2024</p>
            <p><span class="label">Details :</span></p>
            <ul style="margin: 0; padding-left: 20px;">
                <li>Fixed Cost  : Rp 3.500.000</li>
                <li>Credit Cost : Rp 300.000</li>
                <li>ICE Rp 240</li>
            </ul>
        </div>
        <a href="/bank/account" class="back-button">Back to Account</a>
    </div>
</body>
</html>
