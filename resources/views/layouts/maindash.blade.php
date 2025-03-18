<!DOCTYPE html>
<html lang="en">

@include('layouts.topdash')

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-dark position-absolute w-100"></div>

 @include('layouts.sidebardash')


 @yield('content')
  <!--   Core JS Files   -->
 @include('layouts.bottomdash')

</body>

</html>