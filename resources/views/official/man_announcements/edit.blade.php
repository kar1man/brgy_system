@extends('layouts.crud')
<title>Edit Announcements</title>

@section('content')

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
<div class="container">
    <h1>Edit Announcement</h1>
    <div class="col-lg-12">
        <div class="pull-right mb-3 mr-1">
            <a class="btn btn-primary back-button" href="{{ route('official.dashboard') }}">← Back to Dashboard</a>
        </div>
    </div>
    <div class="card">
        <form action="{{ route('announcements.update', $announcement->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $announcement->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ $announcement->content }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('official.dashboard') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection