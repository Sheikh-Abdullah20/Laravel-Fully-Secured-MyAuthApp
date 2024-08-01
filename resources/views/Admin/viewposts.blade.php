@extends('layout.adminLayout')

@section('title')
All-Posts
@endsection

@section('css')
<style>
    .card {
        background-color: #121616;
        border-radius: 2rem;
        color: white;
        box-shadow: 5px 5px 50px rgb(49, 49, 83);
        border: 1px solid yellow;
    }

    .card img {
        border-radius: 4rem;
    }

    svg {
        width: 20px;
        fill: white;
    }
</style>
@endsection

@section('content')
@if(session()->has('success'))
<div class="alert alert-success text-dark">
    {{ session('success') }}
</div>
@elseif (session()->has('error'))
<div class="alert alert-danger text-dark">
    {{ session('error') }}
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-3">
                All Posts
            </h1>
        </div>
    </div>

    <div class="row">
        @foreach ($posts as $post )
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('storage/'. $post->image) }}" class="card-img-top" alt="..."
                    style="object-fit: contain; width:100%; height:200px">
                <hr>
                <div class="card-body">
                    <h2 class="card-heading"> {{ $post->title }} </h2>
                    <p class="card-text">{{ $post->description }}</p>
                    <p>Posted by: {{ $post->user->name }}</p>
                </div>
                <div class="card-footer mx-2">
                    <a href="{{ route('editpost.admin',$post) }}"> <svg class="mx-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg></a>

                    <a href="{{ route('deleteAdmin.post',$post) }}"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</div>

@endsection