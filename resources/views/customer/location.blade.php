@extends('customer.Layouts.master');
@section('contents')
<!-- Location Section -->
<section id="location" class="location section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Location</h2>

    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-4">
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
          <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16014.18241382744!2d98.38553275!3d7.886055549999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x305031a3c9252f2b%3A0xb50a3ef226de7f58!2sTera%20Boulanger!5e1!3m2!1sen!2sth!4v1750308787656!5m2!1sen!2sth" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
          <div class="info-container">
            <div class="section-header">
              <h2>Find Us</h2>
              <p>Visit Us Today</p>
            </div>

            <div class="info-card" data-aos="fade-up" data-aos-delay="300">
              <div class="info-icon">
                <i class="bi bi-geo-alt"></i>
              </div>
              <div class="info-content">
                <h3>Our Location</h3>
                <p>29 Dibuk Rd, Talad Yai, Mueang Phuket District, Phuket 83000</p>
              </div>
            </div>

            <div class="info-card" data-aos="fade-up" data-aos-delay="400">
              <div class="info-icon">
                <i class="bi bi-telephone"></i>
              </div>
              <div class="info-content">
                <h3>Reservations</h3>
                <p>+ (66) 555-7890</p>
                <p class="small-text">We recommend making reservations at least 48 hours in advance</p>
              </div>
            </div>

            <div class="info-card" data-aos="fade-up" data-aos-delay="500">
              <div class="info-icon">
                <i class="bi bi-clock"></i>
              </div>
              <div class="info-content">
                <h3>Hours</h3>
                <div class="hours-grid">
                  <div class="day">Monday - Thursday</div>
                  <div class="time">11:00 AM - 10:00 PM</div>

                  <div class="day">Friday - Saturday</div>
                  <div class="time">11:00 AM - 11:30 PM</div>

                  <div class="day">Sunday</div>
                  <div class="time">10:00 AM - 9:00 PM</div>

                  <div class="day">Brunch Hours</div>
                  <div class="time">Sat &amp; Sun, 10:00 AM - 2:00 PM</div>
                </div>
              </div>
            </div>

            <div class="cta-wrapper" data-aos="fade-up" data-aos-delay="600">
              <a href="{{ route('customerReservation') }}" class="btn-book">Make a Reservation</a>
              <a href="{{ route('customerContact') }}" class="btn-contact">Contact Us</a>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section><!-- /Location Section -->

@endsection