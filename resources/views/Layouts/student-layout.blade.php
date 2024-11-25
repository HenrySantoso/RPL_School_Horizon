<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizon University - @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- CSS for Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">

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
            background-color: #f4f6f9;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: #ecf0f1;
            padding: 15px 20px;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: background 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #1abc9c;
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .sidebar .nav-link.active {
            background-color: #3498db;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .logo {
            text-align: center;
        }

        .logo img {
            max-width: 10%;
        }

        .content {
            flex-grow: 1;
            margin-top: 60px;
        }

        .header {
            padding: 10px 20px;
            background-color: #ecf0f1;
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
            <img src="{{ asset('images/horizon-logo.png') }}" alt="Horizon University Logo">
        </div>
        <nav class="nav flex-column">
            <a href="/student/dashboard" class="nav-link active" id="dashboardLink"><i class="bi bi-people"></i>
                Dashboard</a>
            <a href="/student/invoice" class="nav-link" id="invoiceLink"><i class="bi bi-receipt"></i> Invoice</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Header -->
        <div class="header">
            <div class="header-title">Horizon University</div>
            <div class="user-dropdown">
                <button class="btn btn-light dropdown-toggle" id="dropdownUserButton">
                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name ?? 'Guest' }}
                </button>
                <div class="user-dropdown-menu" id="userDropdownMenu">
                    <a href="#profile"><i class="bi bi-person-fill"></i> Profile</a>
                    <a href="/logout"><i class="bi bi-box-arrow-right"></i> Logout</a>
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
            const dashboardLink = document.getElementById('dashboardLink');
            const invoiceLink = document.getElementById('invoiceLink');

            // Sidebar active state
            dashboardLink.addEventListener('click', () => {
                dashboardLink.classList.add('active');
                invoiceLink.classList.remove('active');
            });

            invoiceLink.addEventListener('click', () => {
                invoiceLink.classList.add('active');
                dashboardLink.classList.remove('active');
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        new DataTable('#example');
    </script>
</body>

</html>
