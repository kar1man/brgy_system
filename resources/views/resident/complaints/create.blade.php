@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>File a Complaint</h1>
    <form action="{{ route('resident.complaints.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="details">Details</label>
            <textarea class="form-control" name="details" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('resident.dashboard') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection