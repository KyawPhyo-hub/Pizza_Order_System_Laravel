@extends('customer.Layouts.master')
@section('contents')
<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Contact</h2>
      {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <!-- Contact Info Boxes -->
      <div class="mb-5 row gy-4">
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="contact-info-box">
            <div class="icon-box">
              <i class="bi bi-geo-alt"></i>
            </div>
            <div class="info-content">
              <h4>Our Address</h4>
              <p>29 Dibuk Rd, Talad Yai, Mueang Phuket District, Phuket 83000</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="contact-info-box">
            <div class="icon-box">
              <i class="bi bi-envelope"></i>
            </div>
            <div class="info-content">
              <h4>Email Address</h4>
              <p>terainfo@example.com</p>
              <p>teracontact@example.com</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
          <div class="contact-info-box">
            <div class="icon-box">
              <i class="bi bi-headset"></i>
            </div>
            <div class="info-content">
              <h4>Hours of Operation</h4>
              <p>Monday-Friday: 9 AM - 6 PM</p>
              <p>Sunday,Saturday: 9 AM - 4 PM</p>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Google Maps (Full Width) -->
    <div class="map-section" data-aos="fade-up" data-aos-delay="200">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16014.18241382744!2d98.38553275!3d7.886055549999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x305031a3c9252f2b%3A0xb50a3ef226de7f58!2sTera%20Boulanger!5e1!3m2!1sen!2sth!4v1750308787656!5m2!1sen!2sth" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <!-- Contact Form Section (Overlapping) -->
    {{-- <div class="container form-container-overlap">
      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
        <div class="col-lg-10">
          <div class="contact-form-wrapper">
            <h2 class="mb-4 text-center">Get in Touch</h2>

            <form action="forms/contact.php" method="post" class="php-email-form">
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-with-icon">
                      <i class="bi bi-person"></i>
                      <input type="text" class="form-control" name="name" placeholder="First Name" value="{{ auth()->user()->name }}" required="">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-with-icon">
                      <i class="bi bi-envelope"></i>
                      <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" placeholder="Email Address" disabled>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <div class="input-with-icon">
                      <i class="bi bi-text-left"></i>
                      <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-group">
                    <div class="input-with-icon">
                      <i class="bi bi-chat-dots message-icon"></i>
                      <textarea class="form-control" name="message" placeholder="Write Message..." style="height: 180px" required=""></textarea>
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>

                <div class="text-center col-12">
                  <button type="submit" class="btn btn-primary btn-submit">SEND MESSAGE</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div> --}}

  </section><!-- /Contact Section -->
@endsection