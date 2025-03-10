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
            background: url("{{ asset('images/background_yellow.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(4px);
        }
        .container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 42px;
            margin-bottom: 10px;
        }
        h2 {
            font-size: 20px;
            margin-bottom: 30px;
            color: #555;
        }
        a {
            display: inline-block;
            padding: 15px 30px;
            margin: 20px;
            font-size: 18px;
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .resident-btn {
            background-color: #c9aa00; /* Gold */
        }
        .resident-btn:hover {
            background-color: #FFC107;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .official-btn {
            background-color: #1E3A8A; /* Royal Blue */
        }
        .official-btn:hover {
            background-color: #1A2E6C;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Barangay Information System (BIS)</h1>
        <h2>A streamlined system for residents and officials to manage barangay services efficiently.</h2>

        <!-- Resident Login Button -->
        <a href="{{ route('resident.login') }}" class="resident-btn">Resident Login</a>

        <!-- Official Login Button -->
        <a href="{{ route('official.login') }}" class="official-btn">Official Login</a>
    </div>
</body>
</html>