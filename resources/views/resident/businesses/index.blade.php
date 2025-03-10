@extends('layouts.crud')

@section('content')
<div class="container">
    <h1>My Business Registrations</h1>
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
                <th width="100px">Action</th>
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
                <td class="text-center">
                    <a class="btn btn-info" href="{{ route('resident.businesses.show', $business->id) }}">View Details</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection