<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('brgy_logo.png') }}">
    <title>@yield('title', 'Login')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .login-container {
            background-color: #fff;
            padding-top: 10px;
            padding-left: 35px;
            padding-right: 35px;
            padding-bottom: 35px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-control {
            padding: 12px;
            border-radius: 8px;
        }
        .btn-primary {
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
        }
        .btn-secondary {
            padding: 12px;
            font-size: 14px;
            border-radius: 8px;
            background-color: #6c757d;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #545b62;
        }
        .alert {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 8px;
        }
        .bi-arrow-left {
            
        }
    </style>

    <script>
        function togglePassword() {
            let password = document.getElementById("password");
            password.type = password.type === "password" ? "text" : "password";
        }
    </script>
</head>
<body>
    <div class="login-container">
    <button class="btn btn-link" onclick="window.history.back()"><i class="bi bi-arrow-left" style="color: #6c757d;"></i></button> 
        <h2>@yield('header', 'Login')</h2>
        @yield('content')
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>