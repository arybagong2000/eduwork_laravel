<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  @vite('resources/css/app.css')
  <style>
    @include('layout.css-master')
    @yield('cssstyle')
  </style>
</head>
<body>  
    <x-navigation />
    <h2 class="mb-4 fw-bold text-center" style="color:#ff8400">@yield('title')</h2>
    <div class="container py-5">
        <x-notification />
        @yield('content')
    </div>
    <x-footer />
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        @yield('javascript')
    </script>
</body>
</html>  