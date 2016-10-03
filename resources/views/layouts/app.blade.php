<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
</head>
<body>
  @include('partials.nav')

  @yield('content')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
