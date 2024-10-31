<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Application')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <!-- Add a navbar or any header content here -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Add a footer here if needed -->
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
