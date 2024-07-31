@extends('layout.adminLayout')

@section('title')
    Admin
@endsection
@section('content')

    @if (session()->has('success'))
        <div class="alert alert-success text-dark">
            {{ session('success') }}
        </div>
    @endif

    <h2 class=" animate-slide display-4 text-center">Admin Dashboard</h2>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <div class="card text-white bg-primary mb-3 animate-slide">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Add-User</h5>
                    <p class="card-text fw-bold">Click on The Button And Than go To the Form To Create User</p>
                    <a href="{{ route('adduser.admin') }}" class="btn btn-light">Create User</a>
                </div>
            </div>
        </div>
       
        <div class="col-lg-6">
            <div class="card text-white bg-dark mb-3 animate-slide">
                <div class="card-body">
                    <h5 class="card-title fw-bold">View Users</h5>
                    <p class="card-text fw-bold">View Users And See How Many Users Are There And Perform Actions</p>
                    <a href="{{route('viewusers.admin')}}" class="btn btn-light  btn-outline-dark">View Users</a>
                </div>
            </div>
        </div>
    </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 ">
                <div class="card text-white bg-secondary opacity-75  mb-3 animate-slide">
                    <div class="card-body text-light ">
                        <h5 class="card-title fw-bold">View Users Posts</h5>
                        <p class="card-text fw-bold">View Users Post And See How Many Posts Are There And Perform Actions</p>
                        <a href="{{ route('viewposts.admin') }}" class="btn btn-light text-dark  ">View Posts</a>
                    </div>
                </div>
            </div>
        </div>
    
@endsection