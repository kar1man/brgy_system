@extends('layouts.crud')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h1>Appointment Details</h1>
        </div>
        <div class="card-body">
            <p><strong>Appointment Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F d, Y h:i A') }}</p>
            <p><strong>Purpose:</strong> {{ $appointment->purpose }}</p>
            <p><strong>Status:</strong> {{ $appointment->status }}</p>
        </div>
        <div class="card-footer text-right">
            <a class="btn btn-primary" href="{{ route('resident.appointments.index') }}">Back to My Appointments</a>
        </div>
    </div>
</div>
@endsection