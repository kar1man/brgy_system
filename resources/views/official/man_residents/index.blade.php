@extends('layouts.crud')
<title>Manage Residents</title>

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h1><strong>Resident Records</strong></h1>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('residents.create') }}"> Add Resident</a>
            </div>
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
                <td>
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