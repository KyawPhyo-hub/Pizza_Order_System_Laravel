@extends('customer.Layouts.master')
@section('contents')
<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="container-fluid hero-container" data-aos="fade-up">
        <div class="row g-0 align-items-center">
          <div class="col-lg-6 content-col">
            <div class="content-wrapper">
              <div class="status-badge">FRESH OUT OF THE OVEN</div>
              <h2>Experience Pizza Perfection, One Slice at a Time</h2>
              <p>Indulge in handcrafted pizzas made with love, fresh ingredients, and bold flavors. Whether you’re craving a classic Margherita or a spicy meat-loaded slice, we promise a taste that lingers beyond the last bite.</p>
              <p class='small-text' style="color: #ceaf7f">"Order your favorite pizza for delivery or pickup, or make a reservation to dine in!"

              </p>

              <div class="opening-hours" data-aos="fade-up" data-aos-delay="500">
                <i class="bi bi-clock"></i>
                <span>Open Daily: 11am - 10pm</span>
              </div>

              <div class="btn-group">
                <a href="{{ route('customerReservation') }}" class="btn btn-book">Book a table</a>
                <a href="{{ route('customerMenu') }}" class="btn btn-menu">Explore Our Menu</a>
              </div>

              <div class="social-links">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 swiper-col">
            <div class="swiper hero-swiper init-swiper" data-aos="zoom-out" data-aos-delay="100">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 800,
                  "autoplay": {
                    "delay": 5000
                  },
                  "effect": "fade",
                  "slidesPerView": 1,
                  "navigation": {
                    "nextEl": ".swiper-button-next",
                    "prevEl": ".swiper-button-prev"
                  }
                }
              </script>
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="img-container">
                    <img class="img-cover" src="{{ asset('customer/assets/img/restaurant/home3.jpeg') }}" alt="Restaurant Ambience">
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="img-container">
                    <img src="{{ asset('customer/assets/img/restaurant/misc-square-1.webp') }}" alt="Signature Dish">
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="img-container">
                    <img class="" src="{{ asset('customer/assets/img/restaurant/home_4.jpeg') }}"alt="Expert Chefs">
                  </div>
                </div>
                <div class="swiper-slide">
                    <div class="img-container">
                      <img class="" src="{{ asset('customer/assets/img/restaurant/home_5.jpeg') }}"alt="Expert Chefs">
                    </div>
                  </div>
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>

          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->













    <!-- Events Section -->
    {{-- <section id="events" class="events section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="mb-5 text-center intro-text" data-aos="fade-up" data-aos-delay="150">
          <h2>Create Unforgettable Moments</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
        </div>

        <div class="event-types">
          <div class="row">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
              <div class="event-type-card">
                <div class="icon-wrapper">
                  <i class="bi bi-calendar-heart"></i>
                </div>
                <h3>Weddings &amp; Celebrations</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</p>
                <span class="capacity">Up to 150 guests</span>
              </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="250">
              <div class="event-type-card">
                <div class="icon-wrapper">
                  <i class="bi bi-building"></i>
                </div>
                <h3>Corporate Events</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</p>
                <span class="capacity">Up to 100 guests</span>
              </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
              <div class="event-type-card">
                <div class="icon-wrapper">
                  <i class="bi bi-people"></i>
                </div>
                <h3>Private Gatherings</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.</p>
                <span class="capacity">Up to 50 guests</span>
              </div>
            </div>
          </div>
        </div>

        <div class="gallery-showcase" data-aos="fade-up" data-aos-delay="150">
          <div class="row g-3">
            <div class="col-lg-8">
              <div class="main-image" data-aos="zoom-in" data-aos-delay="200">
                <img src="assets/img/restaurant/event-1.webp" alt="Event Space" class="img-fluid">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="row g-3">
                <div class="col-lg-12 col-md-6">
                  <div class="gallery-item" data-aos="zoom-in" data-aos-delay="250">
                    <img src="assets/img/restaurant/event-5.webp" alt="Event" class="img-fluid">
                  </div>
                </div>
                <div class="col-lg-12 col-md-6">
                  <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
                    <img src="assets/img/restaurant/event-7.webp" alt="Event" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="event-cta" data-aos="fade-up" data-aos-delay="200">
          <div class="row align-items-center">
            <div class="col-lg-8">
              <h3>Ready to plan your special event?</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed justo magna. Contact us today to discuss your requirements.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
              <a href="#" class="btn-reserve">Reserve Venue</a>
            </div>
          </div>
        </div>

        <div class="featured-events" data-aos="fade-up" data-aos-delay="200">
          <h3>Upcoming Featured Events</h3>

          <div class="row g-4">
            <div class="col-lg-6 col-md-6">
              <div class="featured-event-card" data-aos="fade-up" data-aos-delay="250">
                <div class="event-date">
                  <span class="month">Jun</span>
                  <span class="day">18</span>
                </div>
                <div class="event-content">
                  <div class="event-image">
                    <img src="assets/img/restaurant/event-3.webp" alt="Summer Wine Festival" class="img-fluid">
                  </div>
                  <div class="event-info">
                    <h4>Summer Wine Festival</h4>
                    <ul class="event-meta">
                      <li><i class="bi bi-clock"></i> 6:00 PM - 10:00 PM</li>
                      <li><i class="bi bi-geo-alt"></i> Garden Terrace</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed justo magna dolor sit amet.</p>
                    <a href="#" class="btn-details">View Details</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6">
              <div class="featured-event-card" data-aos="fade-up" data-aos-delay="300">
                <div class="event-date">
                  <span class="month">Jul</span>
                  <span class="day">05</span>
                </div>
                <div class="event-content">
                  <div class="event-image">
                    <img src="assets/img/restaurant/event-8.webp" alt="Gourmet Tasting Night" class="img-fluid">
                  </div>
                  <div class="event-info">
                    <h4>Gourmet Tasting Night</h4>
                    <ul class="event-meta">
                      <li><i class="bi bi-clock"></i> 7:30 PM - 11:00 PM</li>
                      <li><i class="bi bi-geo-alt"></i> Main Dining Hall</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed justo magna dolor sit amet.</p>
                    <a href="#" class="btn-details">View Details</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Events Section --> --}}

    <!-- Contact Section -->


  </main>
@endsection
