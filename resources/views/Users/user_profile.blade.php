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
        background-color: #333 !important;
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
    svg{
            width: 20px;
            fill: white;
        }
        .nav-link:hover{
            transition: 0.3s ease;
            color: #6d6d6d
        }
        .navbar-toggler-icon{
          width: 100%;
          align-content: center;
        }
     
        .navbar-collapse{
            display: flex;
            justify-content: end;
        }
</style>

@endsection
@section('content')
@if (session()->has('success'))
    <div class="alert alert-success text-dark">
        {{ session('success') }}
    </div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger text-dark">
        {{ session('error') }}
    </div>
@endif
<div class="container mt-5">
    
    <div class="row">
        <div class="col-md-12 d-flex justify-content-end">
            <a href="{{ route('profileupdate') }}" class="btn btn-outline-info text-dark my-2"> Update Profile</a>
        </div>
    </div>

  

@php
    $profile = Auth::user()->profile
@endphp
<div class="profile-header">
    
        @isset($profile)
        <div style="position: relative; display: inline-block;">
            <img src="{{ asset('storage/' . Auth::user()->profile) }}" alt="Profile Picture" id="img" style="width: 100px; height: 100px;">
            <a href="{{ route('profileimage.delete') }}" style="position: absolute; top: 0; right: 0; ">
                <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x-circle" viewBox="0 0 16 16">
                    <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zm3.93 4.34a.5.5 0 0 1 0 .707L8.707 8 11.93 11.23a.5.5 0 1 1-.707.707L8 8.707 4.77 11.93a.5.5 0 1 1-.707-.707L7.293 8 4.07 4.77a.5.5 0 1 1 .707-.707L8 7.293l3.23-3.23a.5.5 0 0 1 .707 0z" style="fill: black"/>
                </svg>
            </a> 
        </div>
    @else
        <img src="{{ asset('image/image-insert.png') }}" alt="Profile Picture" id="img" style="width: 100px; height: 100px;">
    @endisset

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