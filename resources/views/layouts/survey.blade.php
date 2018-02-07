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
    <meta property="og:title" content="Knocks">
    <meta property="og:description" content="Knocks Survey Analysis, See what do people think about Social Networking.">
    <meta property="og:image" content="{{asset('snaps/knocks.png')}}">
    <meta property="og:url" content="{{asset('')}}">
    <meta property="fb:app_id" content="1796023703741381" />
    <meta property="og:site_name" content="Knocks, Inc.">
    <meta name="twitter:title" content="Knocks">
    <meta property="og:type" content="website" />
    <meta name="twitter:description" content=" Knocks Survey Analysis, See what do people think about Social Networking.">
    <meta name="twitter:image" content="{{asset('snaps/knocks.png')}}">
    <meta name="twitter:card" content="knocks">
    @if(Auth::check())
    <meta name="pp_index" content="{{ auth()->user()->profile_picture }}">
    <meta name="user" content="{{auth()->user()->id}}">
    <meta name="main_circle" content="{{auth()->user()->mainCircle()->id}}">
    <meta name="session-type" content="user">
    @endif
    @if(!Auth::check())
    <meta name="session-type" content="guest">
    <meta name="user" content="-1">
    <meta name="main_circle" content="-1">
    @endif
    <link rel="icon" type="text/css" href="{{asset('snaps/knocks.png')}}">
    <link rel="shortcut icon" type="text/css" href="{{asset('snaps/knocks.png')}}">
    <link rel = "stylesheet" href = {{asset('css/app.css')}}  />
    @include('layouts.surveynav')
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