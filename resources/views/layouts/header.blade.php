<header class="header_area">
  <!-- Header Top Section -->
  <div class="header-top">
      <div class="container">
          <div class="d-flex align-items-center justify-content-between">
              <!-- Logo -->
              <div id="logo">
                  <a href="{{ route('home') }}">
                      <img src="{{ asset('img/home/logo.png') }}" alt="RumQuest Logo" title="RumQuest" style="height: 100px; width: 100px;">
                  </a>
              </div>

              <!-- Contact Info -->
              <div class="d-none d-md-flex align-items-center">
                  <!-- Phone Info -->
                  <div class="media header-top-info mr-4">
                      <span class="header-top-info__icon"><i class="fas fa-phone-volume"></i></span>
                      <div class="media-body">
                          <p>Have any questions?</p>
                          <p>Call us: <a href="tel:+962 7 9999 9999">+962 7 9999 9999</a></p>
                      </div>
                  </div>

                  <!-- Email Info -->
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

  <!-- Navigation Bar -->
  @include('layouts.navbar')
</header>