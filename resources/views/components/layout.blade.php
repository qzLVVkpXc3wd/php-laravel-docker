<html>

<head>
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/scss/details.scss') }}">
    <title>{{ $title ?? '天使大学 Web出願システム' }}</title>
    @if (session('flash_success'))
        <div class="alert_success bg-success text-center py-3 my-0">
            {{ session('flash_success') }}
        </div>
    @endif
    @if (session('flash_warning'))
        <div class="alert-warning bg-warning text-center py-3 my-0">
            {{ session('flash_warning') }}
        </div>
    @endif

</head>

<body>
    <nav style="background-color:rgb(187, 224, 245)">
        <h3 class="d-flex align-items-center justify-content-center">天使大学 Web出願システム</h3>
    </nav>
    <div style="background-color:rgb(255, 255, 255)" class="d-flex justify-content-center">
        <main class="d-flex align-items-center justify-content-center w-100">
            {{ $slot }}
        </main>
    </div>

    <footer style="background-color:rgb(161, 161, 161)">
        <div class="d-flex align-items-center justify-content-center">
            © 2024 xxx.com
        </div>
    </footer>
</body>

</html>
