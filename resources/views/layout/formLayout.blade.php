<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Website - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>