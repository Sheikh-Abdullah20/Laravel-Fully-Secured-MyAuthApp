<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Website - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        html,body {
            height: 100%;
        }

        body {
            align-content: center;
        }

        .container {
            background-image: conic-gradient(rgb(255, 174, 0), rgb(255, 255, 255)) !important;
        }

        .card {
            background-color: transparent;
            border: 0;

        }

        form input {
            border-radius: 10rem !important;
            height: 4rem;
            box-shadow: 5px 5px 20px rgb(255, 212, 133);
            text-indent: 15px;
        }

        form input:focus {
            box-shadow: 5px 5px 20px rgb(255, 255, 255) !important;
            border-color: white !important;
        }

        form .btn {
            border-radius: 5rem !important;
            height: 3rem;
            margin-top: 2rem;
            transition: 0.3s ease;
        }

        form .btn:hover {
          box-shadow: 5px 5px 20px rgb(187, 187, 187);
            transition: 0.3s ease-in-out;
        }
        select{
            border-radius: 10rem !important;
            height: 4rem;
            box-shadow: 5px 5px 20px rgb(255, 212, 133);
            text-indent: 15px;
        }
    </style>
</head>

<body>
   
    <div class="container">
        
        @if(session()->has('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <!-- card -->
                <div class="card">
                    <div class="card-body rounded">
                        <h1 class=" display-1 text-center fw-bold">Login</h1>
                        <!-- form -->
                        @yield('content')
                        <!-- form -->
                    </div>
                    @if($errors->any())
                    <div class="card-footer text-center text-danger">
                        @foreach ($errors->all() as $err )
                            {{ $err }}
                        @endforeach
                    </div>
                    @endif
                </div>
                <!-- card -->
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</html>