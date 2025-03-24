<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
      <ul class="nav navbar-nav menu_nav">
        <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('aboutus') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('booking.index') }}">Booking</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
        <li class="nav-item submenu dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
          aria-expanded="false">More</a>
          <ul class="dropdown-menu">
            @auth
              @if(isset($bookingId))
                <li><a class="nav-link" href="{{ route('reviews.index', ['booking' => $bookingId]) }}">Reviews</a></li>
              @else
                <li><a class="nav-link" href="{{ route('reviews.index') }}">Reviews</a></li>
              @endif
            @else
              <li><a class="nav-link" href="{{ route('login') }}">Reviews (Login Required)</a></li>
            @endauth
            <li class="nav-item"><a class="nav-link" href="{{ route('faq') }}">FAQ</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contacts') }}">Contact Us</a></li>
      </ul>
    </div>

    <ul class="social-icons ml-auto">
      <li><a href="{{route('login')}}">Login</a></li>
    </ul>
  </div>
</nav>