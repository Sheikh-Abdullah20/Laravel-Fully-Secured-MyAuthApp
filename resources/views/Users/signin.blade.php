@extends('layout.formLayout')


@section('title')
Login
@endsection

@section('form_name')
    Signin
@endsection
@section('content')

@if(session()->has('success'))
    <div class="alert alert-success text-dark">
        {{ session('success') }}
    </div>

    @elseif(session()->has('error'))
    <div class="alert alert-danger text-dark">
        {{ session('error') }}
    </div>
@endif

<form class="w-75 m-auto my-4" method="POST" action="{{ route('get.User') }}">
 @csrf
    <div class="mb-3">
        <input type="email" class="form-control border-1 outline-0" id="exampleInputEmail1"
            aria-describedby="emailHelp" placeholder="Email" name="email" value="{{ old('email') }}">
    </div>
    <div class="mb-3">
        <input type="password" class="form-control" id="exampleInputPassword1"
            placeholder="Password" name="password">
    </div>

    <div class="row">

    
        <div class="col-md-6 text-center ">
            <button type="submit" class="btn btn-light w-50">Login</button>
        </div>
        
        <div class="col-md-6 text-center">
            <a href="{{ route('signup') }}" class="btn btn-light w-50 align-content-center">Signup</a>
            <p>Dont Have An Account?</p>
        </div>

</div>
</form>
    
@endsection