<!DOCTYPE html>
<html class = "knocks_color_kit">


  <head  prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
      <?php
      if(auth()->check()){
      $log = new App\User_log();
      $log->addUserLog(auth()->user()->id , Request::url());
      }
      if(!auth()->check()){
      $log = new App\User_log();
      $log->addAnanymousLog(Request::url());
    }
  ?>
  <meta property="fb:app_id" content="1796023703741381" /> 
  <meta property="og:type"   content="website" /> 
  <meta property="og:url"    content="https://knocksapp.com" /> 
  <meta property="og:title"  content="Knocks" /> 
  <meta property="og:image"  content="https://knocksapp.com/  /knocks_logo.png" /> 
  
  <meta name="google-site-verification" content="tsUIFUH4rGfxzV0M-SOdbUhgUTrwisWXmhNZpda_pVk" />

    <meta charset="UTF-8" />
    <div id = "knocks_nav_vue"></div>
    <!--Internet Explorer Comp -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <link rel="icon" type="text/css" href="{{asset('snaps/knocks_tiny.png')}}">
    <link rel="shortcut icon" type="text/css" href="{{asset('snaps/knocks_tiny.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile First -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="user_lang" content = "en"/>
    <meta name="lang_font" content = "titillium"/>
    <meta name="lang_alignment" content = "left"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user" content="-1">
    <meta name="session-type" content="guest">
    <meta name="description" content="Knocks, Reimagining the social media.">
    <meta name="keywords" content="Knocks,KnocksApp,Who's There,Social Media,social media,social,knocksapp,knocks,survey,Survey,survey,Survey,answers,knocksapp,KnocksApp,knocksapp.com">
    <meta name="author" content="KnocksApp">
    <link rel = "stylesheet" href = {{asset('css/app.css')}}  />
    @yield('externals')
  </head>
  <body class = "knocks_color_kit">

    <main style="padding-left:0px !important; padding-right: 0px !important; ">
      <div id = "app">
     <div>
       @yield('content')




       </div>
      </div>
    </main>
  </body>
  @include('layouts.footer_dark')
  <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "http://www.knocksapp.com",
  "name": "Knocks.",
}
</script>
  <script src = "{{asset('js/app.js')}}"></script>
</html>
