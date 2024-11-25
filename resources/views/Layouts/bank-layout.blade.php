<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank BCA - @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 250px;
            background-color: #005faf;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: #fff;
            padding: 15px 20px;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: background 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #495057;
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .sidebar .nav-link.active {
            background-color: #003d7d;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 80%;
        }

        .content {
            flex-grow: 1;
            margin-top: 60px;
            margin-left: 30px;
        }

        .header {
            padding: 10px 20px;
            background-color: #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: calc(100% - 250px);
            position: fixed;
            top: 0;
            left: 250px;
            z-index: 1000;
        }

        .header-title {
            font-size: 20px;
            font-weight: bold;
        }

        .user-dropdown {
            position: relative;
        }

        .user-dropdown-menu {
            display: none;
            position: absolute;
            top: 40px;
            right: 0;
            background-color: #fff;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            z-index: 1000;
            min-width: 150px;
            overflow: hidden;
        }

        .user-dropdown-menu.show {
            display: block;
        }

        .user-dropdown-menu a {
            padding: 10px;
            color: #333;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease;
        }

        .user-dropdown-menu a:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="images\bca-logo-white.png" alt="Bank Logo">
        </div>
        <nav class="nav flex-column">
            <a href="/bank/home" class="nav-link active" id="homeLink"><i class="bi bi-house-door-fill"></i> Home</a>
            <a href="/bank/payment" class="nav-link" id="paymentLink"><i class="bi bi-credit-card-fill"></i> Payment</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Header -->
        <div class="header">
            <div class="header-title">Bank BCA</div>
            <div class="user-dropdown">
                <button class="btn btn-light dropdown-toggle" id="dropdownUserButton">
                    <i class="bi bi-person-circle"></i> User
                </button>
                <div class="user-dropdown-menu" id="userDropdownMenu">
                    <a href="#profile"><i class="bi bi-person-fill"></i> Profile</a>
                    <a href="#logout"><i class="bi bi-box-arrow-right"></i> Logout</a>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div>
            @yield('content')
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const homeLink = document.getElementById('homeLink');
            const paymentLink = document.getElementById('paymentLink');

            // Add click event listener to the "Home" link
            homeLink.addEventListener('click', () => {
                homeLink.classList.add('active');
                paymentLink.classList.remove('active');
            });

            // Add click event listener to the "Payment" link
            paymentLink.addEventListener('click', () => {
                paymentLink.classList.add('active');
                homeLink.classList.remove('active');
            });

            // Dropdown functionality
            const dropdownButton = document.getElementById('dropdownUserButton');
            const dropdownMenu = document.getElementById('userDropdownMenu');
            dropdownButton.addEventListener('click', () => {
                dropdownMenu.classList.toggle('show');
            });
            window.addEventListener('click', (e) => {
                if (!dropdownButton.contains(e.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });
    </script>
</body>

</html>
