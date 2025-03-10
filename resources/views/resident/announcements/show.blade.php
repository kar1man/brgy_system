@extends('layouts.crud')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h1>{{ $announcement->title }}</h1>
        </div>
        <div class="card-body">
            <p>{{ $announcement->content }}</p>
            <p><strong>Date Posted:</strong> {{ $announcement->date_posted }}</p>
            <p><strong>Posted by:</strong> {{ $announcement->official->full_name }}</p>
        </div>
        <div class="card-footer text-right">
            <a class="btn btn-primary" href="{{ route('resident.announcements.index') }}">Back to Announcements</a>
        </div>
    </div>
</div>
@endsection