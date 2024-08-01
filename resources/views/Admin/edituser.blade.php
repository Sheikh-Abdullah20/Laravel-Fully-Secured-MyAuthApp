@extends('layout.adminLayout')

@section('title')
View
@endsection

@section('content')

<div class="container animate-slide">
    <div class="row text-center">
        <div class="col-md-12">
            <h1 class="display-1">
                Edit User
            </h1>
        </div>
    </div>
<hr>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('editusersuccess.admin', $user->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="name" name="name" value="{{ $user->name }}">
                  </div>

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{ $user->email }}">
                </div>

                  <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" name="role" id="role">
                        <option>Admin</option>
                        <option>User</option>
                    </select>
                  </div>
  
                <button type="submit" class="btn btn-dark">Update</button>
                <a href='{{ route('viewusers.admin') }}' class="btn btn-dark">Back</a>
              </form>
        </div>
    </div>
      
</div>
@endsection