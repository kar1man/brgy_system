@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>Manage Complaints</h1>
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