@extends('layout.usersLayout')
@section('title')
    Home
@endsection

@section('content')
<div class="content">
    <h2 class="animate-slide">Welcome - {{ Auth::user()->name }}</h2>
    <hr>
    <div class="row">
        <div class="col-lg-4">
            <div class="card text-white bg-info mb-3 animate-slide">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Info card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card text-white bg-warning mb-3 animate-slide">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Warning card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card text-white bg-danger mb-3 animate-slide">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Danger card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection