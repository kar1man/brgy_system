<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('brgy_logo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Official Dashboard</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            margin-bottom: 20px;
        }
        .btn-custom {
            width: 100%;
            margin-bottom: 10px;
        }
        .btn-primary {
            background: linear-gradient(45deg, #007bff, #0056b3);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #0056b3, #003f7f);
        }
        .btn-outline-secondary {
            border: 2px solid #6c757d;
        }
        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: #fff;
        }
        .btn-success {
            background: linear-gradient(45deg, #28a745, #218838);
            border: none;
        }
        .btn-success:hover {
            background: linear-gradient(45deg, #218838, #1e7e34);
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Welcome to Official Dashboard</h1>
            </div>
            <div class="card-body">
                <p>Welcome, {{ Auth::user()->official->full_name }}!</p>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h2>Actions</h2>
            </div>
            <div class="card-body">
            <div class="row mb-3">
                    <div class="col-md-12">
                        <a href="{{ route('announcements.index') }}" class="btn btn-success btn-custom">Manage Announcements</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <a href="{{ route('residents.index') }}" class="btn btn-primary btn-custom">Manage Residents</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('complaints.index') }}" class="btn btn-primary btn-custom">Manage Complaints</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <a href="{{ route('appointments.index') }}" class="btn btn-primary btn-custom">Manage Appointments</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('businesses.index') }}" class="btn btn-primary btn-custom">Manage Business Registrations</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>