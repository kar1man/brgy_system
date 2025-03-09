@extends('layouts.crud')
<title>Announcements</title>

@section('content')
<div class="container">
    <h1>Announcement</h1>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date Posted</th>
                <th>Posted By</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($announcements as $announcement)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $announcement->title }}</td>
                <td>{{ Str::limit($announcement->content, 50) }}</td>
                <td>{{ \Carbon\Carbon::parse($announcement->created_at)->timezone('Asia/Manila')->format('F d, Y h:i A') }}</td>
                <td>{{ $announcement->official->full_name }}</td>
                <td class="text-center">
                    <a class="btn btn-info" href="{{ route('resident.announcements.show', $announcement->id) }}">View Details</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection