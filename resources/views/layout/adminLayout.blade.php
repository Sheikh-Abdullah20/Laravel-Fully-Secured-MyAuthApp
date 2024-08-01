<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> App - @yield('title') </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    
    <!-- Custom CSS for animations -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }
        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            background: #333;
            padding-top: 60px;
            transition: all 0.3s;
        }
        .sidebar a {
            padding: 15px;
            text-decoration: none;
            margin-top: 1rem;
            font-size: 18px;
            color: #ccc;
            display: block;
            transition: 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #a7a7a7;
            color: white;
            transition: 0.3s ease;
            border-radius: 1rem;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }
        .card {
            margin-bottom: 20px;
        }
        .animate-slide {
            animation: slideIn 1s;
        }
        @keyframes slideIn {
            from {
                transform: translateY(-50%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        .animate-fade {
            animation: fadeIn 1s;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            },
            
            
            
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{ route('admin') }}"><i class="fas fa-tachometer-alt"></i> DashBoard</a>
        <a href="{{ route('viewusers.admin') }}"><i class="fas fa-users"></i> Users</a>
        <a href="#settings"><i class="fas fa-cogs"></i> Settings</a>
        <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
    @yield('content')
    </div>


</body>
    <!-- Bootstrap and jQuery JS -->
   
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/stackPath.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</html>
