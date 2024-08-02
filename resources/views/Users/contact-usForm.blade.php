@extends('layout.usersLayout')

@section('title')
Contact-Us
@endsection

@section('content')

@if(session()->has('success'))
<div class="alert alert-warning text-dark">
  {{ session('success') }}
</div>
@endif
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Contact-Form</h1>
                </div>
            <div class="card-body">
                <form action="{{ route('contact.success') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" aria-describedby="name" name="name" value="{{ old('name') }}">
                      @error('name')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                      @error('email')
                      <span class="text-danger">
                        {{ $message }}
                      </span>
                    @enderror
                    </div>

                    <div class="mb-3">
                      <label for="subject" class="form-label">Subject</label>
                      <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}">
                      @error('subject')
                      <span class="text-danger">
                        {{ $message }}
                      </span>
                    @enderror
                    </div>

                    <label >Message</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here"  style="height: 100px" name="message" value="{{ old('message') }}"></textarea>
                        @error('message')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                      @enderror
                      </div>

                      <div class="mb-3 mt-2">
                        <label for="image" class="form-label">Attachment</label>
                        <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                        @error('image')
                        <span class="text-danger">
                          {{ $message }}
                        </span>
                      @enderror
                      </div>
                    
                    <button type="submit" class="btn btn-light mt-3">Submit</button>
                  </form>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection