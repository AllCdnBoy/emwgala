<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--<title>{{ config('app.name', 'East Meets West Children\'s Foundation') }}</title>--}}
    <title>East Meets West Children's Foundation</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom Styles (if any) -->
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container d-flex justify-content-center"> <!-- Added flex utilities here -->
        <a href="https://wmwcf.org"><img src="https://www.emwcf.org/files/s5_logo.png" alt="East Meets West Children's Foundation"></a>
    </div>
</nav>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery (optional, if needed for scripts) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Custom Scripts (if any) -->
@stack('scripts')
</body>
</html>
