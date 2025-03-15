<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>RumQuest - Wadi Rum Adventures</title>

	<link rel="icon" href="img/logo.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/magnefic-popup/magnific-popup.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">

  <link rel="stylesheet" href="css/style.css">
</head>
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


    <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="vendors/magnefic-popup/jquery.magnific-popup.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
      <script src="vendors/easing.min.js"></script>
    <script src="vendors/superfish.min.js"></script>
    <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
    <script src="vendors/jquery.ajaxchimp.min.js"></script>
    <script src="vendors/mail-script.js"></script>
    <script src="js/main.js"></script>
  </body>
  </html>