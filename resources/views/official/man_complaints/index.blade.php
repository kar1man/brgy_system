@extends('layouts.crud')
<title>Manage Complaints</title>
<style>
    .table tr:nth-child(odd) {
        background-color: #f9f9f9; /* Light gray for odd rows */
    }
    .btn {
        width: 70px; /* Set equal width for all buttons */
    }
    .btn-success {
        background-color: #4CAF50; /* Green */
        color: white;
        width: 145px;
    }
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
</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left mb-3">
                <h1><strong>Manage Complaints</strong></h1>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="pull-right mb-3 mr-1">
                <a class="btn btn-primary back-button" href="{{ route('official.dashboard') }}">← Back to Dashboard</a>
            </div>
        </div>
        <div class="col-lg-12 margin-tb">
            <!-- Additional space if needed -->
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Details</th>
                <th>Status</th>
                <th>Date Filed</th>
                <th>Filed By</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($complaints as $complaint)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ Str::limit($complaint->details, 50) }}</td>
                <td>{{ $complaint->status }}</td>
                <td>{{ \Carbon\Carbon::parse($complaint->created_at)->timezone('Asia/Manila')->format('F d, Y h:i A') }}</td>
                <td>{{ $complaint->resident->full_name }}</td>
                <td class="text-center">
                    <form action="{{ route('complaints.destroy', $complaint->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('complaints.show', $complaint->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('complaints.edit', $complaint->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection