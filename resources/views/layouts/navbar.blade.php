<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
      <ul class="nav navbar-nav menu_nav">
        <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('aboutus') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('booking') }}">booking</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
        <li class="nav-item submenu dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
          aria-expanded="false">More</a>
          <ul class="dropdown-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('faq') }}">FAQ</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contacts') }}">Contact Us</a></li>
      </ul>
    </div>

    <ul class="social-icons ml-auto">
      <li><a href="{{route('login')}}">login</a></li>
    </ul>
  </div>
</nav>