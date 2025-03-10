@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>Book an Appointment</h1>
    <form action="{{ route('resident.appointments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="appointment_date">Appointment Date and Time</label>
            <input type="datetime-local" name="appointment_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="purpose">Purpose</label>
            <textarea name="purpose" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection