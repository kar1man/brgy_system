@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>Edit Business Registration</h1>
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
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection