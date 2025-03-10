@extends('layouts.crud')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h1>Complaint Details</h1>
        </div>
        <div class="card-body">
            <p><strong>Details: </strong>{{ $complaint->details }}</p>
            <p><strong>Status: </strong>{{ $complaint->status }}</p>
            <p><strong>Date Filed:</strong> {{ \Carbon\Carbon::parse($complaint->created_at)->timezone('Asia/Manila')->format('F d, Y h:i A') }}</p>
        </div>
        <div class="card-footer text-right">
            <a class="btn btn-primary" href="{{ route('resident.complaints.index') }}">Back to My Complaints</a>
        </div>
    </div>
</div>
@endsection