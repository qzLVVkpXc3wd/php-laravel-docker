
<html>

<head>
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/details.scss') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/main.css">
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
