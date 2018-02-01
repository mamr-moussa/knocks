<!DOCTYPE html>
<html>
<head>
  @include('presets.online')
  @include('layouts.nav')
  @yield('externals')
</head>
<body>
  <div id = "app">
    @yield('content')
  </div>
</body>
@yield('tail')
@include('layouts.footer')
<script src = "{{asset('js/app.js')}}"></script>
</html>
