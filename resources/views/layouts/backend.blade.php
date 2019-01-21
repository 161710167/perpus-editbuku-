<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Perpustakaan | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Vendor styles -->
    @include('layouts.partial._styles')
    @stack('styles')
  </head>
  <body data-ma-theme="green">
    <main class="main">
      @include('layouts.partial._loader_page')
      @include('layouts.partial._header')
      @include('layouts.partial._sidebar')
      <section class="content">
        @include('layouts.partial._notif')
        @yield('content')
        @include('layouts.partial._footer')
      </section>
    </main>
    <!-- Older IE warning message -->
    <!--[if IE]>
    <div class="ie-warning">
      <h1>Warning!!</h1>
      <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>
      <div class="ie-warning__downloads">
        <a href="http://www.google.com/chrome">
        <img src="img/browsers/chrome.png" alt="">
        </a>
        <a href="https://www.mozilla.org/en-US/firefox/new">
        <img src="img/browsers/firefox.png" alt="">
        </a>
        <a href="http://www.opera.com">
        <img src="img/browsers/opera.png" alt="">
        </a>
        <a href="https://support.apple.com/downloads/safari">
        <img src="img/browsers/safari.png" alt="">
        </a>
        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
        <img src="img/browsers/edge.png" alt="">
        </a>
        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
        <img src="img/browsers/ie.png" alt="">
        </a>
      </div>
      <p>Sorry for the inconvenience!</p>
    </div>
    <![endif]-->
    <!-- Javascript -->
    <!-- Vendors -->
    @include('layouts.partial._scripts')
    @yield('plugin-scripts')
    @stack('scripts')
  </body>
</html>