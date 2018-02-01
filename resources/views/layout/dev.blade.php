<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8" />
    <!--Internet Explorer Comp -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile First -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="user_lang" content = "en"/>
    <meta name="lang_font" content = "adequate"/>
    <meta name="lang_alignment" content = "left"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="user" content="-1">
    <meta name="session-type" content="guest">
    <link rel = "stylesheet" href = {{asset('css/app.css')}}  />
  @include('layouts.nav')
  @yield('externals')
  <meta name="session-type" content="guest">
</head>
<body>
  <div id = "dev">
    @yield('content')
  </div>
</body>
@yield('tail')
@include('layouts.footer')
<script src = "{{asset('js/app.js')}}"></script>
</html>
