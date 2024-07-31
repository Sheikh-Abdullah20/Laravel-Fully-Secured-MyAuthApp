@extends('layout.usersLayout')

@section('title')
    Profile
@endsection

@section('hideCss',true)

@section('css')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
    }
    .navbar {
        background-color: #333;
    }
    .navbar a {
        color: #fff;
    }
    .content {
        padding: 20px;
    }
    .profile-header {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        animation: slideInDown 0.5s;
    }
    .profile-header img {
        border-radius: 50%;
        margin-right: 20px;
        width: 100px;
        height: 100px;
        object-fit: contain;
        

    }
    .profile-header h2 {
        margin: 0;
    }
    .profile-details {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.5s;
    }
    .profile-details h3 {
        margin-top: 0;
    }
    .profile-details p {
        margin: 5px 0;
    }
    @keyframes slideInDown {
        from {
            transform: translateY(-100%);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
</style>

@endsection
@section('content')
@if (session()->has('success'))
    <div class="alert alert-success text-dark">
        {{ session('success') }}
    </div>
@endif
<div class="container mt-5">
    
    <div class="row">
        <div class="col-md-12 d-flex justify-content-end">
            <a href="{{ route('profileupdate') }}" class="btn btn-outline-info text-dark"> Update Profile</a>
        </div>
    </div>

<div class="profile-header">
    <form action="" method="POST">
        <img src="{{ asset('storage/' . Auth::user()->profile) }}" alt="Profile Picture" id="img">
    </form>
    <input type="file" class="d-none" id="file">
    <div>
        <h2>{{ Auth::user()->name }}</h2>
    </div>
    </div>


<div class="profile-details">
    <h3>Profile Details</h3>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    <p><strong>Role:</strong> {{ Auth::user()->role }}</p>
    <a href="{{ route('home') }}"  class="btn btn-outline-info text-dark  my-2">Back</a>
</div>
</div>
@endsection

@section('script')
    {{-- <script>
  
            document.getElementById('img').addEventListener('click', function() {
            document.getElementById('file').click().
            console.log(img);
        });
    </script> --}}
@endsection