<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
   <head>
       @include('layout.header')
   </head>
   <body class="g-sidenav-show  bg-gray-200">
      @include('layout.sidebar')
      @yield('main-content')
   </body>
      @include('layout.footer')
=======

<head>
   @include('layout.header')
</head>

<body class="g-sidenav-show  bg-gray-200">
   @if(Session::get('role') == 'Accounting Office')
   @include('layout.account-sidebar')
   @else
   @include('layout.sidebar')
   @endif
   @yield('main-content')
</body>
@include('layout.footer')

>>>>>>> 0b37fa62 (New code added)
</html>