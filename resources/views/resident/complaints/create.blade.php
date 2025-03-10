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
       <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection