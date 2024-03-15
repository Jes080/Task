<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Task') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Your additional styles -->
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">

</head>

<body>
    <div id="app">
        <!-- Navbar -->
        <!-- navbar-expand-xs makes the button of sidebar visible in any screen -->
        <nav class="navbar navbar-expand-xs navbar-inverse shadow-sm">
            <div class="container">
                <!-- Sidebar Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Brand -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Task') }}
                </a>
            </div>
        </nav>

        <!-- Offcanvas Sidebar -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Sidebar</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <!-- Sidebar Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/show">Show Task List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/create">Create Task</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/details">Task Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/update">Edit Task</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap and Popper.js scripts -->
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
