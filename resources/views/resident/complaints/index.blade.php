@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>My Complaints</h1>
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Details</th>
                <th>Status</th>
                <th>Date Filed</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($complaints as $complaint)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ Str::limit($complaint->details,50) }}</td>
                <td>{{ $complaint->status }}</td>
                <td>{{ \Carbon\Carbon::parse($complaint->created_at)->timezone('Asia/Manila')->format('F d, Y h:i A') }}</td>
                <td class="text-center">
                    <a class="btn btn-info" href="{{ route('resident.complaints.show', $complaint->id) }}">View Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection