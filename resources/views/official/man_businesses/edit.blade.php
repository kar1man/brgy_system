@extends('layouts.crud')

@section('content')

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
<div class="container">
    <h1>Edit Business Registration</h1>
    <div class="col-lg-12">
        <div class="pull-right mb-3 mr-1">
            <a class="btn btn-primary back-button" href="{{ route('official.dashboard') }}">← Back to Dashboard</a>
        </div>
    </div>
    <div class="card">
        <form action="{{ route('businesses.update', $business->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="business_name">Business Name</label>
                <input type="text" name="business_name" class="form-control" value="{{ $business->business_name }}" required>
            </div>
            <div class="form-group">
                <label for="owner_name">Owner Name</label>
                <input type="text" name="owner_name" class="form-control" value="{{ $business->owner_name }}" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{ $business->address }}" required>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact</label>
                <input type="text" name="contact_number" class="form-control" value="{{ $business->contact_number }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="Pending" {{ $business->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Approved" {{ $business->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                    <option value="Rejected" {{ $business->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('official.dashboard') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection