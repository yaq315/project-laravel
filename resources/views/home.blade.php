


  @extends('layouts.contain-home')





  @section('content1')
  <section class="home-banner-area" id="home">
    <div class="container h-100">
      <div class="home-banner">
        <div class="text-center">
          <h4>Experience the Magic of Wadi Rum</h4>
          <h1>Adventure <em>Awaits</em> You</h1>
          <a class="button home-banner-btn" href="{{ route('booking.index') }}">Book Your Adventure</a>
        </div>
      </div>
    </div>
  </section>
@endsection
  
@section('content2')
<form class="form-search form-search-position" action="{{ route('search.adventures') }}" method="GET">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 gutters-19">
        <div class="form-group">
          <input class="form-control" type="text" name="keywords" placeholder="Search for adventures..." required>
        </div>
      </div>
      <div class="col-lg-6 gutters-19">
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <div class="form-select-custom">
                <select name="adventure_type" id="adventure_type" required>
                  <option value="" disabled selected>Adventure Type</option>
                  <option value="jeep_tour">Jeep Tour</option>
                  <option value="camping">Camping</option>
                  <option value="hiking">Hiking</option>
                  <option value="rock_climbing">Rock Climbing</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-sm gutters-19">
            <div class="form-group">
              <div class="form-select-custom">
                <select name="group_size" id="group_size" required>
                  <option value="" disabled selected>Group Size</option>
                  <option value="1">1 Person</option>
                  <option value="2">2 People</option>
                  <option value="4">4 People</option>
                  <option value="6">6 People</option>
                  <option value="8+">8+ People</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm gutters-19">
        <div class="form-group">
          <div class="form-select-custom">
            <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Start Date" required>
          </div>
        </div>
      </div>
      <div class="col-sm gutters-19">
        <div class="form-group">
          <div class="form-select-custom">
            <input type="date" name="end_date" id="end_date" class="form-control" placeholder="End Date" required>
          </div>
        </div>
      </div>
      <div class="col-sm gutters-19">
        <div class="form-group">
          <div class="form-select-custom">
            <select name="duration" id="duration" required>
              <option value="" disabled selected>Duration</option>
              <option value="1">1 Day</option>
              <option value="2">2 Days</option>
              <option value="3">3 Days</option>
              <option value="5">5 Days</option>
              <option value="7">7 Days</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-lg-4 gutters-19">
        <div class="form-group">
          <button class="button button-form" type="submit">Check Availability</button>
        </div>
      </div>
    </div>
  </div>
</form>
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
              <a class="button button--active home-banner-btn mt-4" href="{{ route('booking.index') }}">Explore Adventures</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endsection
  
  @section('content4')
  <section class="section-margin">
    <div class="container">
      <div class="section-intro text-center pb-80px">
        <div class="section-intro__style">
          <img src="{{ asset('img/home/icon1.png') }}" alt="Adventure Icon" style="height:100px;width:100px">
        </div>
        <h2>Explore Our Adventures</h2>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 d-flex">
          <div class="card card-explore flex-fill">
            <div class="card-explore__img">
              <img class="card-img" src="{{ asset('img/home/img5.jpg') }}" alt="Jeep Tour" style="height:350px">
            </div>
            <div class="card-body d-flex flex-column">
              <h3 class="card-explore__price">$100.00 <sub>/ Per Person</sub></h3>
              <h4 class="card-explore__title">Jeep Tour</h4>
              <p class="flex-grow-1">Explore the stunning desert landscapes of Wadi Rum in a thrilling jeep tour. Perfect for adventure seekers!</p>
              <a class="card-explore__link" href="">Book Now <i class="ti-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 d-flex">
          <div class="card card-explore flex-fill">
            <div class="card-explore__img">
              <img class="card-img" src="{{ asset('img/home/img6.jpeg') }}" alt="Camping" style="height:350px">
            </div>
            <div class="card-body d-flex flex-column">
              <h3 class="card-explore__price">$150.00 <sub>/ Per Person</sub></h3>
              <h4 class="card-explore__title">Desert Camping</h4>
              <p class="flex-grow-1">Spend a night under the stars in a traditional Bedouin camp. Experience the magic of the desert.</p>
              <a class="card-explore__link" href="">Book Now <i class="ti-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 d-flex">
          <div class="card card-explore flex-fill">
            <div class="card-explore__img">
              <img class="card-img" src="{{ asset('img/home/img7.jpg') }}" alt="Hiking" style="height:350px">
            </div>
            <div class="card-body d-flex flex-column">
              <h3 class="card-explore__price">$80.00 <sub>/ Per Person</sub></h3>
              <h4 class="card-explore__title">Hiking Adventure</h4>
              <p class="flex-grow-1">Discover hidden trails and breathtaking views with our guided hiking tours in Wadi Rum.</p>
              <a class="card-explore__link" href="">Book Now <i class="ti-arrow-right"></i></a>
            </div>
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


    @section('content7')
    <section class="section-margin">
      <div class="container">
        <div class="section-intro text-center pb-80px">
          <div class="section-intro__style">
            <img src="{{ asset('img/home/icon1.png') }}" alt="Adventure Icon" style="height:100px;width:100px">
          </div>
          <h2>Adventure News & Events</h2>
        </div>
  
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
            <div class="card card-news">
              <div class="card-news__img">
                <img class="card-img" src="{{ asset('img/home/img9.jpg') }}" alt="New Jeep Tours" style="height:250px">
              </div>
              <div class="card-body">
                <h4 class="card-news__title"><a href="#">New Jeep Tours Available</a></h4>
                <ul class="card-news__info">
                  <li><a href="#"><span class="news-icon"><i class="ti-notepad"></i></span> 15th Oct, 2023</a></li>
                  <li><a href="#"><span class="news-icon"><i class="ti-comment"></i></span> 05 Comments</a></li>
                </ul>
                <p>We’ve added new jeep tour routes to explore hidden parts of Wadi Rum. Book now for an unforgettable adventure!</p>
                <a class="card-news__link" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
  
          <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
            <div class="card card-news">
              <div class="card-news__img">
                <img class="card-img" src="{{ asset('img/home/img10.webp') }}" alt="Desert Marathon">
              </div>
              <div class="card-body">
                <h4 class="card-news__title"><a href="#">Annual Desert Marathon</a></h4>
                <ul class="card-news__info">
                  <li><a href="#"><span class="news-icon"><i class="ti-notepad"></i></span> 20th Nov, 2023</a></li>
                  <li><a href="#"><span class="news-icon"><i class="ti-comment"></i></span> 10 Comments</a></li>
                </ul>
                <p>Join us for the annual Wadi Rum Desert Marathon. A unique opportunity to challenge yourself in a stunning environment.</p>
                <a class="card-news__link" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
  
          <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
            <div class="card card-news">
              <div class="card-news__img">
                <img class="card-img" src="{{ asset('img/home/img11.webp') }}" alt="Stargazing Event">
              </div>
              <div class="card-body">
                <h4 class="card-news__title"><a href="#">Stargazing Night Event</a></h4>
                <ul class="card-news__info">
                  <li><a href="#"><span class="news-icon"><i class="ti-notepad"></i></span> 5th Dec, 2023</a></li>
                  <li><a href="#"><span class="news-icon"><i class="ti-comment"></i></span> 07 Comments</a></li>
                </ul>
                <p>Experience the magic of the desert sky with our stargazing event. Perfect for astronomy enthusiasts and families.</p>
                <a class="card-news__link" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endsection



