@extends('layouts.crud')
<title>Announcements</title>

@section('content')
<div class="container">
    <h1>Announcements</h1>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <a class="btn btn-success mb-3 pull-right" href="{{ route('announcements.create') }}">Post Announcement</a>
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