@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>My Appointments</h1>
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