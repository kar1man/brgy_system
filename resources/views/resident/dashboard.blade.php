@extends('layouts.crud')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('brgy_logo.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Resident Dashboard</title>
    <style>
        body {
            background-color: #fff8e1; /* Softer yellow/cream background */
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
            background: linear-gradient(45deg, #FFC107, #FFA000); /* Gold/yellow theme */
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #FFA000, #FF8F00);
        }
        .btn-outline-secondary {
            border: 2px solid #FFC107; /* Lighter gold border */
        }
        .btn-outline-secondary:hover {
            background-color: #FFC107;
            color: #fff;
        }
        .btn-success {
            background: linear-gradient(45deg, #8a3d00, #552400); /* Dark burnt orange gradient */
            border: none;
            color: white;
        }

        .btn-success:hover {
            background: linear-gradient(45deg, #552400, #2e1400); /* Even darker on hover */
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
                <h1>Welcome to Resident Dashboard</h1>
            </div>
            <div class="card-body">
                <h6>Good Day, {{ Auth::user()->resident->full_name }}! 🌞</h6>
                <p>Stay informed and take action on your barangay-related matters with ease. Here, you can file complaints, book and track appointments, and manage your business registrations—all in one place. Don't forget to check for announcements to stay updated on important barangay news and events!</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h2>Actions</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a href="{{ route('resident.announcements.index') }}" class="btn btn-success btn-custom">📢 View Announcements</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <a href="{{ route('resident.complaints.create') }}" class="btn btn-primary btn-custom">📄 File a Complaint</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('resident.complaints.index') }}" class="btn btn-outline-secondary btn-custom">📄 View My Complaint</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <a href="{{ route('resident.appointments.create') }}" class="btn btn-primary btn-custom">📅 Book an Appointment</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('resident.appointments.index') }}" class="btn btn-outline-secondary btn-custom">📅 View My Appointment</a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <a href="{{ route('resident.businesses.create') }}" class="btn btn-primary btn-custom">🏢 Register a Business</a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('resident.businesses.index') }}" class="btn btn-outline-secondary btn-custom">🏢 View My Business Registration</a>
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
