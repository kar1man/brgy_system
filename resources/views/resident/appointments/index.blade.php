@extends('layouts.crud')
<title>My Appointments</title>
<style>
    .table tr:nth-child(odd) {
        background-color: #f9f9f9; /* Light gray for odd rows */
    }
    .btn {
        width: 100%; /* Set equal width for all buttons */
    }
    .btn-success {
        background-color: #4CAF50; /* Green */
        color: white;
        width: 145px;
    }
    .back-button {
        display: inline-block;
        width: 100%;
        margin-bottom: 10px; /* Space below the button */
        background-color: #6c757d !important; /* Bootstrap secondary color */
        border: none;
        color: white;
        padding: 8px 12px;
        font-size: 14px;
        border-radius: 5px;
        transition: 0.3s;
    }
    .back-button:hover {
        background-color: #5a6268; /* Darker gray on hover */
    }
</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left mb-3">
                <h1><strong>My Appointments</strong></h1>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="pull-right mb-3">
                <a class="btn btn-primary back-button" href="{{ route('resident.dashboard') }}">← Back to Dashboard</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Appointment Date</th>
                <th>Purpose</th>
                <th>Status</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($appointments as $appointment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F d, Y h:i A') }}</td>
                <td>{{ Str::limit($appointment->purpose, 50) }}</td>
                <td>{{ $appointment->status }}</td>
                <td class="text-center">
                    <a class="btn btn-info" href="{{ route('resident.appointments.show', $appointment->id) }}">View Details</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection