@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>Edit Appointment</h1>
    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="appointment_date">Appointment Date and Time</label>
            <input type="datetime-local" name="appointment_date" class="form-control" value="{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="form-group">
            <label for="purpose">Purpose</label>
            <textarea name="purpose" class="form-control" rows="5" required>{{ $appointment->purpose }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="Pending" {{ $appointment->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Approved" {{ $appointment->status == 'Approved' ? 'selected' : '' }}>Approved</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection