<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="icon" href="{{ asset('./img/logo_2.png') }}" type="">
  <link rel="stylesheet" href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/themify-icons/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/magnefic-popup/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <!-- Header Section -->
 @include('layouts.header')

  <!-- Main Content -->
  <main>
    @yield('content')
  
</main>

    @include('layouts.footer')

 

  <!-- Footer Section -->
 

  <!-- Scripts -->
  <script src="{{ asset('vendors/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendors/magnefic-popup/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('vendors/easing.min.js') }}"></script>
  <script src="{{ asset('vendors/superfish.min.js') }}"></script>
  <script src="{{ asset('vendors/nice-select/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('vendors/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ asset('vendors/mail-script.js') }}"></script>
  <script src="{{ asset('vendors/jquery.form.js') }}"></script>
  <script src="{{ asset('vendors/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('vendors/contact.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>