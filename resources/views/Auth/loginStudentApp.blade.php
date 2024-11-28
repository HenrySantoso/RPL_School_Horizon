<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizon University - Login Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body,
        html {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('{{ asset('images/university.jpeg') }}') no-repeat center center fixed;
            background-size: cover;
        }

        .login-container {
            max-width: 400px;
            padding: 2rem;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .logo {
            max-width: 150px;
            max-height: 150px;
            margin-bottom: 1rem;
        }

        .toggle-password {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <!-- Logo Section -->
        <img src="images\horizon-logo.png" alt="University Logo" class="logo">
        <form action="{{ route('loginStudent') }}" method="post">
            @csrf
            <div class="mb-3 position-relative">
                <label class="form-label visually-hidden" for="username">Username</label>
                <i class="fas fa-user position-absolute top-50 start-0 translate-middle-y ms-2 text-muted"></i>
                <input type="text" class="form-control ps-5" placeholder="Username" name="username" id="username"
                    required>
            </div>
            <div class="mb-3 position-relative">
                <label class="form-label visually-hidden" for="password">Password</label>
                <i class="fas fa-lock position-absolute top-50 start-0 translate-middle-y ms-2 text-muted"></i>
                <input type="password" class="form-control ps-5 pe-5" placeholder="Password" name="password"
                    id="password" required>
                <i class="fas fa-eye position-absolute top-50 end-0 translate-middle-y me-2 toggle-password"
                    id="togglePassword"></i>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            @if ($errors->any())
                <div class="mt-3 alert alert-danger">
                    {{ $errors->first('loginStudent') }}
                </div>
            @endif
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>

</body>

</html>
