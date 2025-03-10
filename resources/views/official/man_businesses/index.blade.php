@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>Manage Business Registrations</h1>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Business Name</th>
                <th>Owner Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Registered By</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($businesses as $business)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $business->business_name }}</td>
                <td>{{ $business->owner_name }}</td>
                <td>{{ $business->address }}</td>
                <td>{{ $business->contact_number }}</td>
                <td>{{ $business->status }}</td>
                <td>{{ $business->resident->full_name }}</td>
                <td class="text-center">
                    <form action="{{ route('businesses.destroy', $business->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('businesses.show', $business->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('businesses.edit', $business->id) }}">Edit</a>
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