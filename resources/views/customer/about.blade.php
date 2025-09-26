@extends('customer.Layouts.master');
@section('contents')
<!-- About Section -->
<section id="about" class="about section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row align-items-center gy-4">
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <div class="about-content">
            <h3>Our Baking Journey</h3>
            <p class="fst-italic">At Laravelizza, our story is rooted in the art of baking. From kneading the perfect dough to crafting golden, bubbly crusts, we pour our passion into every step. Our journey began with a mission: to bring people together over warm, freshly baked pizzas and create lasting memories.</p>
            <p>Every slice is a testament to our commitment to baking excellence. Whether it’s a classic Margherita or a bold new creation, we believe that pizza is more than a meal—it’s a celebration of the baker’s craft.</p>

            <div class="mt-4 chef-signature">
              <div class="row align-items-center">
                <div class="col-auto">
                  <img src="assets/img/restaurant/chef-1.webp" class="chef-avatar rounded-circle" alt="Chef Portrait">
                </div>
                <div class="col">
                  <p class="mb-2 chef-message">"Baking is a language through which all the following properties may be expressed: harmony, creativity, happiness, beauty, poetry, complexity, magic, humor, provocation and culture."</p>
                  <p class="chef-name">Executive Chef</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="300">
          <div class="about-image-wrapper">
            <img src="assets/img/restaurant/showcase-4.webp" class="shadow img-fluid main-image" alt="Restaurant Interior">
            <img src="assets/img/restaurant/showcase-2.webp" class="shadow img-fluid accent-image" alt="Chef Preparing Food">
            <span class="text-center establishment-year d-flex align-items-center justify-content-center">Est. 2010</span>
          </div>
        </div>
      </div>

      <div class="pt-4 mt-5 row features-section">
        <div class="mb-4 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="feature-box">
            <div class="feature-icon">
              <i class="bi bi-award"></i>
            </div>
            <h4>Award Winning</h4>
            <p>Our pizzas have been recognized by local and national food critics for their outstanding flavor and quality.</p>
          </div>
        </div>

        <div class="mb-4 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="feature-box">
            <div class="feature-icon">
              <i class="bi bi-egg-fried"></i>
            </div>
            <h4>Fresh Ingredients</h4>
            <p>We source only the freshest, hand-picked ingredients—ripe tomatoes, creamy mozzarella, and aromatic basil—for every pizza we make.</p>
          </div>
        </div>

        <div class="mb-4 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="feature-box">
            <div class="feature-icon">
              <i class="bi bi-people"></i>
            </div>
            <h4>Expert Team</h4>
            <p>Our team of skilled pizzaiolos brings years of expertise and a passion for perfection to every pie, ensuring an unforgettable dining experience.</p>
          </div>
        </div>

        <div class="mb-4 col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="feature-box">
            <div class="feature-icon">
              <i class="bi bi-heart"></i>
            </div>
            <h4>Cooked with Love</h4>
            <p>Every pizza is made with care and devotion, just like Nonna used to make. We believe that love is the secret ingredient in every slice.</p>
          </div>
        </div>
      </div>

      <div class="mt-3 row">
        <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
          <div class="stats-container">
            <div class="stat-item">
              <span class="stat-number"><span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="0" class="purecounter">15</span>+</span>
              <p class="stat-label">Years Experience</p>
            </div>

            <div class="stat-item">
              <span class="stat-number"><span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="0" class="purecounter">5</span></span>
              <p class="stat-label">Expert Chefs</p>
            </div>

            <div class="stat-item">
              <span class="stat-number"><span data-purecounter-start="0" data-purecounter-end="3" data-purecounter-duration="0" class="purecounter">3</span></span>
              <p class="stat-label">Culinary Awards</p>
            </div>

            <div class="stat-item">
              <span class="stat-number"><span data-purecounter-start="0" data-purecounter-end="15000" data-purecounter-duration="0" class="purecounter">15000</span>+</span>
              <p class="stat-label">Happy Customers</p>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section><!-- /About Section -->

  <!-- Testimonials Section -->
  {{-- <section id="testimonials" class="testimonials section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Testimonials</h2>
      <p>The Heartfelt Feedback</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="swiper init-swiper">
        <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 600,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": "auto",
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 1,
                "spaceBetween": 40
              },
              "1200": {
                "slidesPerView": 3,
                "spaceBetween": 1
              }
            }
          }
        </script>
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
              </p>
              <div class="mt-auto profile">
                <img src="assets/img/person/person-m-9.webp" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
              </p>
              <div class="mt-auto profile">
                <img src="assets/img/person/person-f-5.webp" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
              </p>
              <div class="mt-auto profile">
                <img src="assets/img/person/person-f-12.webp" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
              </p>
              <div class="mt-auto profile">
                <img src="assets/img/person/person-m-12.webp" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
              </p>
              <div class="mt-auto profile">
                <img src="assets/img/person/person-m-13.webp" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div>
          </div><!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section><!-- /Testimonials Section --> --}}
@endsection