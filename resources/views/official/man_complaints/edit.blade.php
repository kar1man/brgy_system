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
<div class="container mt-5">
    <div class="col-lg-12">
        <div class="pull-right mb-3 mr-1">
            <a class="btn btn-primary back-button" href="{{ route('official.dashboard') }}">← Back to Dashboard</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1 class="h3">Edit Complaint</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('complaints.update', $complaint->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea name="details" class="form-control" rows="5" required>{{ $complaint->details }}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="Pending" {{ $complaint->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Resolved" {{ $complaint->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                    </select>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('official.dashboard') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection