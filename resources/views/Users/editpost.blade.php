@extends('layout.usersLayout')
@section('title')
Add-Post
@endsection

@section('content')

<div class="container animate-slide">
    <div class="content">

        <div class="row text-center mt-5">
            <div class="col-md-12">
                <h2 class="display-5"> Edit <span class="span_post"> Post </span></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('edit.postSuccess',$post->id) }}" method="POST" enctype="multipart/form-data">
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

                    <button type="submit" class="btn btn-dark">Post</button>


                </form>
            </div>
        </div>


    </div>
</div>
@endsection