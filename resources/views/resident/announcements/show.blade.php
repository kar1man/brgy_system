@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>{{ $announcement->title }}</h1>
    <p>{{ $announcement->content }}</p>
    <p><strong>Date Posted:</strong> {{ $announcement->date_posted }}</p>
    <p><strong>Posted by:</strong> {{ $announcement->official->full_name }}</p>
    <a class="btn btn-primary" href="{{ route('resident.announcements.index') }}">Back to Announcements</a>
</div>
@endsection