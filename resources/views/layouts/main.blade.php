<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8" />
    <!--Internet Explorer Comp -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile First -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="user_lang" content = "en"/>
    <meta name="lang_font" content = "titllium"/>
    <meta name="lang_alignment" content = "left"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user" content="-1">
    <meta name="session-type" content="guest">
    <link rel="icon" type="text/css" href="{{asset('snaps/knocks.png')}}">
    <link rel = "stylesheet" href = {{asset('css/app.css')}}  />
  @include('layouts.nav')
  @yield('externals')
  <meta name="session-type" content="guest">
</head>
  <body>
    <main id = "knocks_main">
      <div class = "knocks_full_wrapper"></div>
      <div id = "app"  class = "row"> 
       <div>
       @yield('content')




       </div>
      </div>
    </main>
    @include('layouts.footer')
  </body>
@yield('tail')
<script src = "{{asset('js/app.js')}}"></script>
</html>
