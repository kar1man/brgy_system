@extends('layouts.crud')
<title>Manage Residents</title>
<style>
    .table tr:nth-child(odd) {
        background-color: #f9f9f9; /* Light gray for odd rows */
    }
    .btn {
        
        width: 70px; /* Set equal width for all buttons */
    }
    .btn-success {
        background-color: #4CAF50; /* Green */
        color: white;
        width: 145px;
    }
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

</style>

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left mb-3">
                <h1><strong>Manage Resident Records</strong></h1>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="pull-right mb-3">
                <a class="btn btn-success" href="{{ route('residents.create') }}">+ Add Resident</a>
            </div>

            <div class="pull-right mb-3 mr-1">
                <a class="btn btn-primary back-button" href="{{ route('official.dashboard') }}">← Back to Dashboard</a>
            </div>
        </div>
        <div class="col-lg-12 margin-tb">
            
        </div>
    </div>
    @php
        $i = 0;
    @endphp

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Full Name</th>
                <th>Birthdate</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Username</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($residents as $resident)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $resident->full_name }}</td>
                <td>{{ $resident->birthdate }}</td>
                <td>{{ $resident->address }}</td>
                <td>{{ $resident->contact_number }}</td>
                <td>{{ $resident->user->username ?? 'N/A' }}</td>
                <td class="text-center">
                    <form action="{{ route('residents.destroy', $resident->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('residents.show', $resident->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('residents.edit', $resident->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $residents->links() }}
@endsection