<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="{{ url('/images/logohead.svg') }}">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main {
            flex: 1;
            display: flex;
        }

        .sidebar {
            width: 280px;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        #sidebarMenu .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        #sidebarMenu .nav-link {
            transition: background-color 0.2s ease;
        }
    </style>
</head>

<body>

    <div class="main">
        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
            <img src="{{ url('/images/logo.svg') }}" />
            <hr>
            <ul class="nav nav-pills flex-column mb-auto" id="sidebarMenu">
                <li><a href="/dashboard" class="nav-link text-white">Dashboard</a></li>
                <li><a href="/users" class="nav-link text-white">Users</a></li>
                <li><a href="/pets" class="nav-link text-white">Pets</a></li>
                <li><a href="/bookings" class="nav-link text-white">Bookings</a></li>
                <li><a href="/services" class="nav-link text-white">Services</a></li>
                <li><a href="/booking-services" class="nav-link text-white">Booking Services</a></li>
                <li><a href="/kennel-spaces" class="nav-link text-white">Kennel Spaces</a></li>
            </ul>
        </div>

        <!-- Main content -->
        <div class="content">
            @yield("content")
        </div>
    </div>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>