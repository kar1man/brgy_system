@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>Appointment Details</h1>
    <p><strong>Appointment Date:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F d, Y h:i A') }}</p>
    <p><strong>Purpose:</strong> {{ $appointment->purpose }}</p>
    <p><strong>Status:</strong> {{ $appointment->status }}</p>
    <a class="btn btn-primary" href="{{ route('resident.appointments.index') }}">Back to My Appointments</a>
</div>
@endsection