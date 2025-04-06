<!DOCTYPE html>
<html lang="en">
   @include('layouts.top')



<body>
	<!-- ================ header section start ================= -->	
	@include('layouts.header')
	

@yield('content')



  <!-- ================ start footer Area ================= -->
 @include('layouts.footer')
  <!-- ================ End footer Area ================= -->

@include('layouts.bottom')

</body>
</html>