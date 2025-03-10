@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>Manage Appointments</h1>
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
                <th>Resident</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($appointments as $appointment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F d, Y h:i A') }}</td>
                <td>{{ Str::limit($appointment->purpose, 50) }}</td>
                <td>{{ $appointment->status }}</td>
                <td>{{ $appointment->resident->full_name }}</td>
                <td class="text-center">
                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('appointments.show', $appointment->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('appointments.edit', $appointment->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection