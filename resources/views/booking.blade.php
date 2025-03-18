@extends('layouts.contain-booking')


@section('content')


<section class="section-margin section-margin--small">
    <div class="container">
      <div class="section-intro text-center pb-80px">
        <div class="section-intro__style">
          {{-- <img src="{{ asset('public/img/home/wadi-rum-bedouin-camp.jpg') }}" alt="Image"> --}}

        </div>
        <h2>Book Your Adventure in Wadi Rum</h2>
      </div>

      <div class="row pb-4">
        <div class="col-md-6 col-xl-4 mb-5">
          <div class="card card-explore">
            <div class="card-explore__img">
              <img class="card-img" src="./img/home/wadi-rum-bedouin-camp.jpg" alt="" style="height: 250px">
              
            </div>
            <div class="card-body">
              <h3 class="card-explore__price">$120.00 <sub>/ Per Night</sub></h3>
              <h4 class="card-explore__title"><a href="#">Bedouin Camp Tent</a></h4>
              <p>Live the authentic Bedouin experience in a tent equipped with all the amenities, with a glamorous view of the Wadi Rum desert.</p>
              <a class="card-explore__link" href="#">Book Now <i class="ti-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-xl-4 mb-5">
          <div class="card card-explore">
            <div class="card-explore__img">
              <img class="card-img" src="./img/home/12.jpg" alt="">
            </div>
            <div class="card-body">
              <h3 class="card-explore__price">$180.00 <sub>/ Per Night</sub></h3>
              <h4 class="card-explore__title"><a href="#">Luxury Martian Dome</a></h4>
              <p>Enjoy a luxurious stay in a glass dome that gives you a panoramic view of the starry sky in the heart of Rum Valley. </p>
              <a class="card-explore__link" href="#">Book Now <i class="ti-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-xl-4 mb-5">
          <div class="card card-explore">
            <div class="card-explore__img">
              <img class="card-img" src="img/home/13.jpg" alt="">
            </div>
            <div class="card-body">
              <h3 class="card-explore__price">$200.00 <sub>/ Per Night</sub></h3>
              <h4 class="card-explore__title"><a href="#">Desert Panoramic Suite</a></h4>
              <p>A luxurious suite with modern design allows you to enjoy the beauty of the desert with the utmost comfort and luxury.</p>
              <a class="card-explore__link" href="#">Book Now <i class="ti-arrow-right"></i></a>
            </div>
          </div>
        </div>


        <div class="col-md-6 col-xl-4 mb-5">
          <div class="card card-explore">
            <div class="card-explore__img">
              <img class="card-img" src="img/home/ballon.jpeg" alt="" style="height: 250px">
            </div>
            <div class="card-body">
              <h3 class="card-explore__price">$100.00<sub>/ Per Person</sub></h3>
              <h4 class="card-explore__title"><a href="#">Hot Air Ballon Ride</a></h4>
              <p>Get a breathtaking aerial view of the desert at sunrise.</p>
              <a class="card-explore__link" href="#">Book Now <i class="ti-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-xl-4 mb-5">
          <div class="card card-explore">
            <div class="card-explore__img">
              <img class="card-img" src="img/home/sandboarding.jpeg" alt="" style="height: 250px">
            </div>
            <div class="card-body">
              <h3 class="card-explore__price">$20.00<sub>/ Per Person</sub></h3>
              <h4 class="card-explore__title"><a href="#">Sandboarding</a></h4>
              <p>Find a large dune and slide down on a sandboard for an adrenaline rush!</p>
              <a class="card-explore__link" href="#">Book Now <i class="ti-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-xl-4 mb-5">
          <div class="card card-explore">
            <div class="card-explore__img">
              <img class="card-img" src="img/home/camel.jpeg" alt="" style="height: 250px">
            </div>
            <div class="card-body">
              <h3 class="card-explore__price">$50.00<sub>/ Per Person</sub></h3>
              <h4 class="card-explore__title"><a href="#">Camel Trekking</a></h4>
              <p>Experience the desert like the Bedouins by riding a camel through the dunes. You can do a short ride or a multi-day trek</p>
              <a class="card-explore__link" href="#">Book Now <i class="ti-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-xl-4 mb-5">
          <div class="card card-explore">
            <div class="card-explore__img">
              <img class="card-img" src="img/home/14.jpg" alt="" style="height: 250px">
            </div>
            <div class="card-body">
              <h3 class="card-explore__price">$250.00 <sub>/ Per Night</sub></h3>
              <h4 class="card-explore__title"><a href="#">Royal Desert Lodge</a></h4>
              <p>Luxury accommodation in a stylish desert cottage with special services and SUV tours</p>
              <a class="card-explore__link" href="#">Book Now <i class="ti-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-xl-4 mb-5">
          <div class="card card-explore">
            <div class="card-explore__img">
              <img class="card-img" src="img/home/15.jpg" alt="" style="height: 230px">
            </div>
            <div class="card-body">
              <h3 class="card-explore__price">$130.00 <sub>/ Per Night</sub></h3>
              <h4 class="card-explore__title"><a href="#">Wadi Rum Sky Camp</a></h4>
              <p>A unique stay in a secluded place allows you to experience memorable stargazing in the calm of the desert. </p>
              <a class="card-explore__link" href="#">Book Now <i class="ti-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-xl-4 mb-5">
          <div class="card card-explore">
            <div class="card-explore__img">
              <img class="card-img" src="img/home/16.jpg" alt="" style="height: 250px">
            </div>
            <div class="card-body">
              <h3 class="card-explore__price">$200.00 <sub>/ Per Night</sub></h3>
              <h4 class="card-explore__title"><a href="#">Panoramic Desert Suite</a></h4>
              <p>A luxurious suite with stunning views of the desert with all the modern amenities. </p>
              <a class="card-explore__link" href="#">Book Now <i class="ti-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection