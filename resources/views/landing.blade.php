<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('brgy_logo.png') }}">
    <title>{{ config('app.name') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 36px;
            margin-bottom: 30px;
        }
        a {
            display: inline-block;
            padding: 15px 30px;
            margin: 10px;
            font-size: 18px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .resident-btn {
            background-color: #4CAF50; /* Green */
        }
        .resident-btn:hover {
            background-color: #45a049;
        }
        .official-btn {
            background-color: #007BFF; /* Blue */
        }
        .official-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Barangay System</h1>

        <!-- Resident Login Button -->
        <a href="{{ route('resident.login') }}" class="resident-btn">Resident Login</a>

        <!-- Official Login Button -->
        <a href="{{ route('official.login') }}" class="official-btn">Official Login</a>
    </div>
</body>
</html>