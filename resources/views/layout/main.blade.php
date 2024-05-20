<!DOCTYPE html>
<html lang="en">
   <head>
       @include('layout.header')
   </head>
   <body class="g-sidenav-show  bg-gray-200">
      @include('layout.sidebar')
      @yield('main-content')
   </body>
      @include('layout.footer')
</html>