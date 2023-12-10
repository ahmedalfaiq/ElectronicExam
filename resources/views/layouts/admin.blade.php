<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', ' Electronic Exams') </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" >

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .wrapper {
            display: flex;
        }

        #sidebar {
            width: 250px;
            background: #343a40;
            color: #fff;
            height: 100vh;
            padding-top: 20px;
        }

        #content {
            flex: 1;
            padding: 20px;
        }

        #sidebar a {
            color: #fff;
        }

        #sidebar a:hover {
            color: #007bff;
        }
    </style>
</head>

<body>

    <div class="wrapper">

        <!-- Sidebar -->
        <nav id="sidebar">
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('admin') }}"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('questiosn',[1]) }}"><i class="fas fa-users"></i> Question</a>
                </li>
                <li>
                    <a href="{{ route('admin.dept.index') }}"><i class="fas fa-cogs"></i> Dept</a>
                </li>
                <li>
                    <a href="{{ route('admin.level.index') }}"><i class="fas fa-users"></i> Levles</a>
                </li>
                <li>
                    <a href="{{ route('home') }}"><i class="fas fa-cogs"></i> Home</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <!-- Page content goes here -->
            <h2>Welcome to the Admin Dashboard</h2>
           <div>
            @yield('content')
           </div>
        </div>

    </div>


    <!-- Custom Script for Sidebar Toggle -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

</body>

</html>
