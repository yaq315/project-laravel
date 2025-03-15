<!-- resources/views/about.blade.php -->
@extends('layouts.contain-about')


@section('content')
<section class="u-clearfix u-image u-shading u-section-1" id="carousel_80da" data-image-width="1980" data-image-height="1320">
    <div class="u-clearfix u-sheet u-valign-middle-xl u-sheet-1">
      
	<section class="blog-banner-area" id="about">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>About Us</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
          
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
@endsection

   
@section('content3')
<section class="welcome">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5 mb-4 mb-lg-0">
        <div class="row no-gutters welcome-images">
          <div class="col-sm-7">
            <div class="card">
              <img class="img-fluid" src="{{ asset('img/home/img2.jpg') }}" alt="Wadi Rum Desert">
            </div>
          </div>
          <div class="col-sm-5">
            <div class="card">
              <img class="img-fluid" src="{{ asset('img/home/imag3.webp') }}" alt="Wadi Rum Camp">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="card">
              <img class="img-fluid" src="{{ asset('img/home/img4.jpeg') }}" alt="Wadi Rum Adventure">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="welcome-content">
          <h2 class="mb-4"><span class="d-block">Welcome</span> to RumQuest</h2>
          <p>Discover the breathtaking beauty and thrilling adventures of Wadi Rum. Whether you're seeking a serene escape or an adrenaline-packed journey, RumQuest offers unforgettable experiences in the heart of the desert.</p>
          <p>From jeep tours and camping under the stars to hiking and rock climbing, our adventures are designed to immerse you in the magic of Wadi Rum.</p>
          <a class="button button--active home-banner-btn mt-4" href="{{ route('booking') }}">Explore Adventures</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('content5')
      <!-- ================ special section start ================= -->
      <section class="section-padding bg-porcelain">
        <div class="container">
          <div class="section-intro text-center pb-80px">
            <div class="section-intro__style">
              <img src="{{ asset('img/home/icon1.png') }}" alt="Adventure Icon" style="height:100px;width:100px">
            </div>
            <h2>Our Special Services</h2>
          </div>
          <div class="special-img mb-30px">
            <img class="img-fluid" src="{{ asset('img/home/img8.jpeg') }}" alt="Adventure Banner">
          </div>
      
          <div class="row">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
              <div class="card card-special">
                <div class="media align-items-center mb-1">
                  <span class="card-special__icon"><i class="ti-map-alt"></i></span>
                  <div class="media-body">
                    <h4 class="card-special__title">Guided Tours</h4>
                  </div>
                </div>
                <div class="card-body">
                  <p>Explore the stunning desert landscapes of Wadi Rum with our expert guides. Discover hidden gems and enjoy a safe, thrilling adventure.</p>
                </div>
              </div>
            </div>
      
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
              <div class="card card-special">
                <div class="media align-items-center mb-1">
                  <span class="card-special__icon"><i class="ti-camera"></i></span>
                  <div class="media-body">
                    <h4 class="card-special__title">Photography</h4>
                  </div>
                </div>
                <div class="card-body">
                  <p>Capture the breathtaking beauty of Wadi Rum with our professional photography services. Perfect for memories that last a lifetime.</p>
                </div>
              </div>
            </div>
      
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
              <div class="card card-special">
                <div class="media align-items-center mb-1">
                  <span class="card-special__icon"><i class="ti-star"></i></span>
                  <div class="media-body">
                    <h4 class="card-special__title">Luxury Camping</h4>
                  </div>
                </div>
                <div class="card-body">
                  <p>Experience the magic of the desert with our luxury camping packages. Enjoy comfort and adventure under the stars.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endsection


      @section('content6')
      <!-- ================ Carousel section start ================= -->
      <section class="section-margin">
        <div class="container">
          <div class="section-intro text-center pb-20px">
            <div class="section-intro__style">
              <img src="{{ asset('img/home/icon1.png') }}" alt="Adventure Icon" style="height:100px;width:100px">
            </div>
            <h2>What Our Guests Say</h2>
          </div>
          <div class="owl-carousel owl-theme testi-carousel">
            <div class="testi-carousel__item">
              <div class="media">
                <div class="testi-carousel__img">
                  <img src="{{ asset('img/home/testimonial1.png') }}" alt="Guest 1">
                </div>
                <div class="media-body">
                  <p>"The jeep tour was absolutely amazing! The guides were knowledgeable, and the landscapes were breathtaking. Highly recommend RumQuest!"</p>
                  <div class="testi-carousel__intro">
                    <h3>omar</h3>
                    <p>Adventure Enthusiast</p>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="testi-carousel__item">
              <div class="media">
                <div class="testi-carousel__img">
                  <img src="{{ asset('img/home/testimonial2.png') }}" alt="Guest 2">
                </div>
                <div class="media-body">
                  <p>"Camping under the stars in Wadi Rum was a dream come true. The luxury camp was comfortable, and the experience was unforgettable."</p>
                  <div class="testi-carousel__intro">
                    <h3>ahmed</h3>
                    <p>Travel Blogger</p>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="testi-carousel__item">
              <div class="media">
                <div class="testi-carousel__img">
                  <img src="{{ asset('img/home/testimonial3.png') }}" alt="Guest 3">
                </div>
                <div class="media-body">
                  <p>"The hiking adventure was incredible. The trails were well-organized, and the views were out of this world. Thank you, RumQuest!"</p>
                  <div class="testi-carousel__intro">
                    <h3>adam</h3>
                    <p>Nature Lover</p>
                  </div>
                </div>
              </div>
            </div>
    
          </div>
        </div>
      </section>
    @endsection

	
  
  <!-- ================ carousel section end ================= -->



 