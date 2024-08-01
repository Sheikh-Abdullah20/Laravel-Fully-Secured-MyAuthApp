@extends('layout.usersLayout')

@section('title')
    Profile-Update
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
        cursor: pointer;
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
    .form-group {
        margin-bottom: 15px;
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

<div class="container mt-5">
    <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="profile-header">
            <input type="file" id="file" onchange="document.querySelector('#img').src= window.URL.createObjectURL(this.files[0])" name="profile" style="display:none;">
            @if (Auth::user()->profile)
            <img src="{{ asset('storage/' . Auth::user()->profile) }}" alt="Profile Picture" id="img" width="100px">
            @else
            <img src="{{ asset('image/image-insert.png') }}" alt="Profile Picture" id="img" style="width: 100px; height: 100px;">
            @endif
            <div>
                <h2>{{ Auth::user()->name }}</h2>
                @error('profile')
                <span class="text-danger">
                   {{ $message }}
                </span>
           @enderror
            </div>
          
        </div>

        <div class="profile-details">
            <h3>Profile Details</h3>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                <div class="span text-danger font-weight-bold">You May Lose Your Data After Changing The Email So Be Careful !!</div>
            </div>

            <div class="row">

                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-info text-dark">Save Changes</button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('profile') }}"  class="btn btn-outline-info text-dark w-75">Back</a>
                </div>
             </div>

        </div>
    </form>

</div>
@endsection

@section('script')
    <script>
  
            document.getElementById('img').addEventListener('click', function() {
            document.getElementById('file').click().
            console.log(img);
        });
    </script>
@endsection