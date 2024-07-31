@extends('layout.adminLayout')

@section('title')
View
@endsection

@section('content')

@if (session()->has('success'))
<div class="alert alert-success text-dark">
    {{ session('success') }}
</div>
@endif

@if (session()->has('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<div class="container animate-slide">
    <div class="row text-center">
        <div class="col-md-12">
            <h1 class="display-1">
                Users
            </h1>
        </div>
    </div>
<hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID:</th>
                    <th scope="col">NAME:</th>
                    <th scope="col">EMAIL:</th>
                    <th scope="col">ROLE:</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ( $users as $user )
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('edituser.admin', $user) }}"><i class="fa-regular fa-pen-to-square" style="color: #000000"></i></a>
                            <a href="{{ route('delete.user' , $user) }}"><i class="fa-solid fa-trash" style="color: #000000;"></i></a>
                        </td>
                      </tr>
                      
                    @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection