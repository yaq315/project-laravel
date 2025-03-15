<header class="header_area">
  <div class="header-top">
    <div class="container">
      <div class="d-flex align-items-center">
        <div id="logo">
          <a href="{{ route('home') }}">
            <img src="{{ asset('img/logo.png') }}" alt="RumQuest Logo" title="RumQuest" style="height: 100px; width: 100px;">
          </a>
        </div>
        <div class="ml-auto d-none d-md-block d-md-flex">
          <div class="media header-top-info">
            <span class="header-top-info__icon"><i class="fas fa-phone-volume"></i></span>
            <div class="media-body">
              <p>Have any questions?</p>
              <p>Call us: <a href="tel:+962 7 9999 9999">+962 7 9999 9999</a></p>
            </div>
          </div>
          <div class="media header-top-info">
            <span class="header-top-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <p>Need assistance?</p>
              <p>Email: <a href="mailto:info@rumquest.com">info@rumquest.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('layouts.navbar')
</header>