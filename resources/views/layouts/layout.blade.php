<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "{{asset('css/app.css')}}"  />
    <meta name="user_lang" content = "{{ auth()->user()->userLanguage() }}"/>
    <meta name="lang_font" content = "{{ auth()->user()->userLanguageFont() }}"/>
    <meta name="lang_alignment" content = "{{ auth()->user()->userLanguageAlignment() }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <nav>
      <div class="nav-wrapper">
         <a href="#" class="brand-logo">Register</a>
      </div>
     </nav>
  </head>
  <body >
    <main>
      <div id = "app">
         @yield('content')

      </div>
    </main>
  </body>
  <footer class="page-footer">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Footer Content</h5>
            <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Links</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © 2014 Copyright Text
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
      </div>
    </footer>

  <script src = "{{asset('js/app.js')}}"></script>
</html>
