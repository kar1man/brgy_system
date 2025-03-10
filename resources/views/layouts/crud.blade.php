<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="{{ asset('brgy_logo.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar {
            border-radius: 0; /* No radius */
        }
        .navbar .navbar-brand {
            font-weight: bold;
            color: white !important;
            font-family: Arial, sans-serif;
            font-size: 1.5rem;
        }
        .navbar .logout-btn {
            background: linear-gradient(45deg, #FFC107, #FFA000); /* Gold/yellow theme */
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .navbar .logout-btn:hover {
            background: linear-gradient(45deg, #FFA000, #FF8F00);
        }
        
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </li>
            <!-- Other links -->
        </ul>
    </div>
</nav>
  
<div class="container">
    <br>
    @yield('content')
</div>
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
