<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Login & Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .auth-wrapper {
            background: #fff;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .auth-wrapper h3 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }
        .auth-wrapper .form-control {
            border-radius: 50px;
            padding-left: 2.5rem;
        }
        .auth-wrapper .form-control-feedback {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }
        .auth-wrapper .btn-custom {
            background-color: #007bff;
            color: #fff;
            border-radius: 50px;
            padding: 0.6rem 1.5rem;
            width: 100%;
        }
        .auth-wrapper .btn-custom:hover {
            background-color: #0056b3;
        }
        .auth-wrapper .switch-link {
            text-align: center;
            margin-top: 1rem;
        }
    </style>
</head>
<body>

    <!-- Login Form -->
    <div class="auth-wrapper">
        <h3>Login</h3>
        @if (session('error'))

    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <form action="{{ route('loginUserBerhasil') }}" method="post">
            @csrf
            <div class="mb-3 position-relative">
                <span class="form-control-feedback"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3 position-relative">
                <span class="form-control-feedback"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-custom">Login</button>
            <div class="switch-link">
                <a href="{{ route('register') }}">Don't have an account? Register</a>
            </div>
        </form>
    </div>

    

    
</body>
</html>
