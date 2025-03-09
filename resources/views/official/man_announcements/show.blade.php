@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>{{ $announcement->title }}</h1>
    <h1>{{ $announcement->content }}</h1>
    <p><strong>Date Posted: </strong>{{ $announcement->date_posted }}</p>
    <p><strong>Posted by: </strong>{{ $announcement->official->full_name }}</p>
    <a class="btn btn-primary" href="{{ route('announcements.index') }}">Back to Announcements</a>
</div>
@endsection