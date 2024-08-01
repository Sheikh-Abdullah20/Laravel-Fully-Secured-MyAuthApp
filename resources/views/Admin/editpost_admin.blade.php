@extends('layout.adminLayout')

@section('title')
Edit Post
@endsection
@section('css')
<style>
  
</style>
@endsection
@section('content')

@if(session()->has('error'))
<div class="alert alert-danger text-dark">
    {{ session('error') }}
</div>
@endif

<div class="container animate-slide">
    <div class="row text-center">
        <div class="col-md-12">
            <h1 class="display-1">
                Edit Post
            </h1>
        </div>
    </div>
<hr>
    <div class="row">
        <div class="col-md-12">
            
            <form action="{{ route('edit.postSuccessAdmin',$post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" aria-describedby="title" name="title"
                        value="{{ $post->title }}">

                </div>


                <div class="mb-3">
                    <label for="Description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="Description" name="description"
                        value="{{ $post->description }}">

                </div>


                <div class="mb-3">
                    <label for="image" class="form-label">Post Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="{{ $post->image }}">
                </div>

                <button type="submit" class="btn btn-dark">Update</button>


            </form>
        </div>
    </div>
</div>
@endsection