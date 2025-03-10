@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>Register a Business</h1>
    <form action="{{ route('resident.businesses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="business_name">Business Name</label>
            <input type="text" name="business_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="owner_name">Owner Name</label>
            <input type="text" name="owner_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contact_number">Contact</label>
            <input type="text" name="contact_number" class="form-control" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('resident.dashboard') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection