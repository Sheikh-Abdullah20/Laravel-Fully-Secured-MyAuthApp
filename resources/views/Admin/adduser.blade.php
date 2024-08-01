@extends('layout.adminLayout')

@section('title')
Add-User
@endsection

@section('content')
@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="container animate-slide">
    <div class="row text-center">
        <div class="col-md-12">
            <h1 class="display-1">
                Add User
            </h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('add.User.Admin') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="name" name="name" value="{{ old('name') }}">
                  </div>

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
                  </div>

                  <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" name="role" id="role">
                        <option>Admin</option>
                        <option>User</option>
                    </select>
                  </div>
  
                <button type="submit" class="btn btn-dark">Submit</button>
              </form>
        </div>
    </div>

</div>
@endsection