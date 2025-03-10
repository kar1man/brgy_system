@extends('layouts.crud')
<title>Announcements</title>

<style>
    .btn-success {
        background-color: #28a745 !important; /* Bootstrap success color */
        border: none;
        padding: 10px 20px; /* Increased padding for better touch target */
        font-size: 16px; /* Increased font size for better readability */
        border-radius: 5px;
        transition: 0.3s;
    }
    .btn-success:hover {
        background-color: #218838; /* Darker green on hover */
    }
    .btn-info, .btn-primary, .btn-danger {
        padding: 10px 15px; /* Increased padding for better touch target */
        font-size: 14px; /* Increased font size for better readability */
        border-radius: 5px;
        transition: 0.3s;
    }
    .btn-info:hover {
        background-color: #117a8b; /* Darker blue on hover */
    }
    .btn-primary:hover {
        background-color: #0056b3; /* Darker blue on hover */
    }
    .btn-danger:hover {
        background-color: #c82333; /* Darker red on hover */
    }
    .table {
        margin-top: 20px; /* Added margin for better spacing */
    }
    .table th, .table td {
        vertical-align: middle; /* Center align text vertically */
    }
    .alert-success {
        margin-top: 20px; /* Added margin for better spacing */
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
                <h1><strong>Announcements</strong></h1>
            </div>
        </div>
        <div class="col-lg-12">
            
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="col-lg-12">
        <a class="btn btn-success mb-3 pull-right" href="{{ route('announcements.create') }}">+ New Announcement</a>
        <div class="pull-right mb-3 mr-1">
                <a class="btn btn-primary back-button" href="{{ route('official.dashboard') }}">← Back to Dashboard</a>
            </div>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date Posted</th>
                <th>Posted By</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($announcements as $announcement)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $announcement->title }}</td>
                <td>{{ $announcement->content }}</td>
                <td>{{ \Carbon\Carbon::parse($announcement->created_at)->timezone('Asia/Manila')->format('F d, Y h:i A') }}</td>
                <td>{{ $announcement->official->full_name }}</td>
                <td class="text-center">
                    <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('announcements.show', $announcement->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('announcements.edit', $announcement->id) }}">Edit</a>
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