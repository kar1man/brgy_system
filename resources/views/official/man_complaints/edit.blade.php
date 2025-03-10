@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>Edit Complaint</h1>
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
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection