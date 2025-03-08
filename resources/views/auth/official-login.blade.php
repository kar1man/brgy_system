@extends('layouts.login')

@section('title', 'Official Login')

@section('header', 'Official Login')

@section('content')
    <form method="POST" action="{{ route('official.login') }}">
        @csrf
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
            <input type="checkbox" onclick="togglePassword()"> Show Password
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
@endsection