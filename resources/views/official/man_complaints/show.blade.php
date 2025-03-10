@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>Complaint Details</h1>
    <p><strong>Details:</strong> {{ $complaint->details }}</p>
    <p><strong>Status:</strong> {{ $complaint->status }}</p>
    <p><strong>Date Filed:</strong> {{ \Carbon\Carbon::parse($complaint->created_at)->timezone('Asia/Manila')->format('F d, Y h:i A') }}</p>
    <p><strong>Filed By:</strong> {{ $complaint->resident->full_name }}</p>
    <a class="btn btn-primary" href="{{ route('complaints.index') }}">Back to Complaints</a>
</div>
@endsection