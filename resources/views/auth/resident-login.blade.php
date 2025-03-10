@extends('layouts.login')

@section('title', 'Resident Login')

<style>
    body {
        background: url("{{ asset('images/background_yellow.jpg') }}") no-repeat center center fixed;
        background-size: cover;
        background-color: #FFF8E1; /* Light yellow tint */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .login-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        width: 100%;
        max-width: 400px;
    }

    .form-group {
        margin-bottom: 10px !important;
        position: relative;
    }

    .form-control {
        border: 1px solid #FFC107; /* Light yellow border */
        border-radius: 6px;
        padding: 10px;
        width: 100%;
    }

    .login-button {
        background-color: #FFC107 !important; /* Force priority */
        border: none;
        margin-top: 20px;
        color: white !important;
        font-weight: bold !important;
        padding: 10px 15px;
        border-radius: 6px;
        transition: 0.3s;
        width: 100%;
    }

    .login-button:hover {
        background-color: #d6a100 !important; /* Darker gold */
    }
    
    .login-button:focus {
        outline: none !important;
        box-shadow: none !important;
    }

    .back-arrow {
        color: #FFC107;
        font-size: 20px;
        cursor: pointer;
        display: inline-block;
        margin-bottom: 20px;
    }

    .toggle-password {
        position: absolute;
        top: 71%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #4f5254; 
        font-size: 16px; /* Adjust as needed */
        display: flex;
        align-items: center;
    }
</style>

@section('header', 'Resident Login')

@section('content')
    <div class="login-card">
        @if ($errors->has('credentials'))
            <div class="alert alert-danger">
                {{ $errors->first('credentials') }}
            </div>
        @endif
        <form method="POST" action="{{ route('resident.login') }}">
            @csrf
            <div class="form-group">
                <label class="mb-0">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="mb-0">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <span class="toggle-password" onclick="togglePassword()">
                    <i class="fa fa-eye" id="togglePasswordIcon"></i>
                </span>
            </div>
            <button type="submit" class="btn login-button">Login</button>
        </form>
    </div>
@endsection

<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var togglePasswordIcon = document.getElementById("togglePasswordIcon");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            togglePasswordIcon.classList.remove("fa-eye");
            togglePasswordIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            togglePasswordIcon.classList.remove("fa-eye-slash");
            togglePasswordIcon.classList.add("fa-eye");
        }
    }
</script>
<!-- Include FontAwesome for the eye icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">