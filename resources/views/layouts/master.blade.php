<!DOCTYPE html>
<html lang="en">
<head>
@include("partials.head")
</head>
<body>
  @include('partials.nav')
<div class="container">
  @include('partials.alerts')
  @yield("content")
</div>

</body>
</html>
