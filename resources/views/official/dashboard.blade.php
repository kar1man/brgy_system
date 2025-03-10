@extends('layouts.crud')

@section('content')
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
            background-color: #e3f2fd; /* Softer blue/cream background */
        }
        .container {
            margin-top: 50px;
        }
        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for separation */
        }
        .btn-custom {
            width: 100%;
            margin-bottom: 10px;
        }
        .btn-primary {
            background: linear-gradient(45deg, #1e88e5, #1565c0); /* Royal blue theme */
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #1565c0, #0d47a1);
        }
        .btn-outline-secondary {
            border: 2px solid #1e88e5; /* Lighter blue border */
        }
        .btn-outline-secondary:hover {
            background-color: #1e88e5;
            color: #fff;
        }
        .btn-success {
            background: linear-gradient(45deg, #12263f, #0d1b2a); /* Dark navy blue, slightly lighter */
            border: none;
            color: white;
        }

        .btn-success:hover {
            background: linear-gradient(45deg, #0d1b2a, #091422); /* Slightly darker on hover */
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .card-header h1, .card-header h2 {
            font-weight: bold; /* Bold important headers */
        }
        .card-header h1 {
            font-size: 2rem; /* Larger font size for better readability */
        }
        .card-header h2 {
            font-size: 1.5rem;
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
                <h6>Good Day, {{ Auth::user()->official->full_name }}! 🌞</h6>
                <p>Manage and oversee barangay-related matters efficiently. Here, you can manage residents, handle complaints, schedule and track appointments, and oversee business registrations. Stay updated with the latest announcements and ensure smooth operations within the barangay.</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h2>Actions</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a href="{{ route('announcements.index') }}" class="btn btn-success btn-custom">📢 Manage Announcements</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <a href="{{ route('residents.index') }}" class="btn btn-primary btn-custom">👥 Manage Residents</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('complaints.index') }}" class="btn btn-primary btn-custom">📄 Manage Complaints</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <a href="{{ route('appointments.index') }}" class="btn btn-primary btn-custom">📅 Manage Appointments</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('businesses.index') }}" class="btn btn-primary btn-custom">🏢 Manage Business Registrations</a>
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
@endsection