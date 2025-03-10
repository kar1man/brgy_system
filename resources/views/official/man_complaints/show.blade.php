@extends('layouts.crud')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1 class="h3">Complaint Details</h1>
        </div>
        <div class="card-body">
            <p><strong>Details:</strong> {{ $complaint->details }}</p>
            <p><strong>Status:</strong> <span class="badge badge-info">{{ $complaint->status }}</span></p>
            <p><strong>Date Filed:</strong> {{ \Carbon\Carbon::parse($complaint->created_at)->timezone('Asia/Manila')->format('F d, Y h:i A') }}</p>
            <p><strong>Filed By:</strong> {{ $complaint->resident->full_name }}</p>
        </div>
        <div class="card-footer text-right">
            <a class="btn btn-secondary" href="{{ route('complaints.index') }}">Back to Complaints</a>
        </div>
    </div>
</div>
@endsection