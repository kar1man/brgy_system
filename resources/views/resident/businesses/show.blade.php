@extends('layouts.crud')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h1>Business Registration Details</h1>
        </div>
        <div class="card-body">
            <p><strong>Business Name:</strong> {{ $business->business_name }}</p>
            <p><strong>Owner Name:</strong> {{ $business->owner_name }}</p>
            <p><strong>Address:</strong> {{ $business->address }}</p>
            <p><strong>Contact:</strong> {{ $business->contact_number }}</p>
            <p><strong>Status:</strong> {{ $business->status }}</p>
        </div>
        <div class="card-footer text-right">
            <a class="btn btn-primary" href="{{ route('resident.businesses.index') }}">Back to My Business Registrations</a>
        </div>
    </div>
</div>
@endsection