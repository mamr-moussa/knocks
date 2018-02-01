<!DOCTYPE html>
<html>
<head>
  @include('presets.online')
  @include('layouts.nav')
  @yield('externals')
  <meta name="session-type" content="guest">
</head>
<body>
  <div id = "root">
    @yield('content')
  </div>
</body>
</html>
