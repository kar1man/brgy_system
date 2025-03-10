@extends('layouts.crud')

<style>
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
    .card {
        margin-top: 20px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-group label {
        font-weight: bold;
    }
    .form-control {
        border-radius: 5px;
    }
    .btn-primary, .btn-secondary {
        border-radius: 5px;
    }
</style>

@section('content')
<div class="container">
    <h1>Edit Resident</h1>
    <div class="col-lg-12">
        <div class="pull-right mb-3 mr-1">
            <a class="btn btn-primary back-button" href="{{ route('official.dashboard') }}">← Back to Dashboard</a>
        </div>
    </div>
    <div class="card">
        <form action="{{ route('residents.update', $resident->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" value="{{ $resident->full_name }}" class="form-control" placeholder="Enter full name" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" name="birthdate" value="{{ $resident->birthdate }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" value="{{ $resident->address }}" class="form-control" placeholder="Enter address" required>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number" value="{{ $resident->contact_number }}" class="form-control" placeholder="Enter contact number" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" value="{{ $resident->user->username }}" class="form-control" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter new password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('official.dashboard') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection