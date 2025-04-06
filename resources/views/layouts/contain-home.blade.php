<!DOCTYPE html>
<html lang="en">
@include('layouts.top')
<body>
  
    <main class="site-main">
    @include('layouts.header')

    @yield('content1')

    @yield('content2')

    @yield('content3')

    @yield('content4')

    @yield('content5')

    @yield('content6')

    @yield('content7')


  </main>
    @include('layouts.footer')


  @include("layouts.bottom")
  </body>
  </html>