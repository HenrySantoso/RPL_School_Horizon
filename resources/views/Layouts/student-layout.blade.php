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
            margin-top: 40px;
            width: 250px;
            background-color: #2c3e50;
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
            position: fixed;
            height: 100%;
            transition: transform 0.3s ease-in-out;
            transform: translateX(0);
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .sidebar .nav-link {
            color: #ecf0f1;
            padding: 15px 20px;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: background 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }

        .sidebar .nav-link.active {
            background-color: #1abc9c;
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar .nav-link:hover {
            background-color: #137360;
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .content {
            flex-grow: 1;
            margin-left: 250px;
            margin-top: 60px;
            transition: margin-left 0.3s ease-in-out;
        }

        .content.full {
            margin-left: 0;
        }

        .header {
            padding: 10px 20px;
            background-color: #ecf0f1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .header-title {
            display: flex;
            align-items: center;
            font-size: 20px;
            font-weight: bold;
        }

        .header-title img {
            max-height: 40px;
            margin-right: 10px;
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

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <nav class="nav flex-column">
            <a href="/student/dashboard" class="nav-link {{ Request::is('student/dashboard') ? 'active' : '' }}"
                id="dashboardLink">
                <i class="bi bi-people"></i> Dashboard
            </a>
            <a href="/student/invoice" class="nav-link {{ Request::is('student/invoice') ? 'active' : '' }}"
                id="invoiceLink">
                <i class="bi bi-receipt"></i> Invoice
            </a>
            <a href="/student/transaction" class="nav-link {{ Request::is('student/transaction') ? 'active' : '' }}"
                id="transactionLink">
                <i class="bi bi-file-text-fill"></i> Transaction List
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="content" id="content">
        <!-- Header -->
        <div class="header">
            <button class="btn btn-light d-md-none" id="toggleSidebar"><i class="bi bi-list"></i></button>
            <div class="header-title">
                <img src="{{ asset('images/horizon-logo.png') }}" alt="Horizon University Logo">
                Horizon University
            </div>
            <div class="user-dropdown">
                <button class="btn btn-light dropdown-toggle" id="dropdownUserButton">
                    <i class="bi bi-person-circle"></i> {{ Auth::user()->username ?? 'Guest' }}
                </button>
                <div class="user-dropdown-menu" id="userDropdownMenu">
                    <!-- Logout form using POST method -->
                    <form action="{{ route('logoutStudent') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                            Logout</button>
                    </form>
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
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            const toggleSidebar = document.getElementById('toggleSidebar');

            toggleSidebar.addEventListener('click', () => {
                sidebar.classList.toggle('hidden');
                content.classList.toggle('full');
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
