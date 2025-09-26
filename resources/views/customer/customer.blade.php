@extends('customer.Layouts.master');
@section('contents')
     <!-- Chefs Section -->
     <section id="chefs" class="chefs section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Chefs</h2>
          <p>The Culinary Team</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="row">
            <div class="col-lg-5">
              <div class="chef-highlight" data-aos="fade-right" data-aos-delay="200">
                <figure class="chef-image">
                  <img src="assets/img/restaurant/chef-1.webp" class="img-fluid" alt="Executive Chef">
                </figure>
                <div class="chef-details">
                  <h3>Executive Chef</h3>
                  <h2>Gabriel Turner</h2>
                  <div class="chef-awards">
                    <span><i class="bi bi-star-fill"></i> James Beard Award</span>
                    <span><i class="bi bi-star-fill"></i> Two Michelin Stars</span>
                  </div>
                  <p>Executive Chef Gabriel Turner, a James Beard Award winner and two-Michelin-star recipient, infuses every dish with unparalleled expertise. His culinary vision artfully blends classic techniques with innovative flavors, ensuring each dining experience is a memorable celebration of excellence.</p>
                  <div class="chef-signature">
                    <img src="assets/img/misc/signature-1.webp" alt="Chef Signature">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-7">
              <div class="team-container" data-aos="fade-left" data-aos-delay="300">
                <div class="row g-4">
                  <div class="col-md-6">
                    <div class="chef-card" data-aos="zoom-in" data-aos-delay="200">
                      <div class="chef-img">
                        <img src="assets/img/restaurant/chef-2.webp" class="img-fluid" alt="Chef Portrait">
                        <div class="social-links">
                          <a href="#"><i class="bi bi-instagram"></i></a>
                          <a href="#"><i class="bi bi-twitter-x"></i></a>
                          <a href="#"><i class="bi bi-facebook"></i></a>
                        </div>
                      </div>
                      <div class="chef-info">
                        <h4>Sophia Martinez</h4>
                        <p class="role">Baker</p>
                        <p class="details text-justify" style="">Our Baker, Sophia Martinez, meticulously crafts our signature pizza dough daily. Her passion and skill ensure every golden crust, delivering authentic, consistent quality to all our pizzas.</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="chef-card" data-aos="zoom-in" data-aos-delay="250">
                      <div class="chef-img">
                        <img src="assets/img/restaurant/chef-3.webp" class="img-fluid" alt="Chef Portrait">
                        <div class="social-links">
                          <a href="#"><i class="bi bi-instagram"></i></a>
                          <a href="#"><i class="bi bi-twitter-x"></i></a>
                          <a href="#"><i class="bi bi-facebook"></i></a>
                        </div>
                      </div>
                      <div class="chef-info">
                        <h4>Marcus Chen</h4>
                        <p class="role">Assistance</p>
                        <p class="details">Marcus Chen, our dedicated kitchen assistant, ensures smooth operations. He provides essential support, meticulously preparing ingredients and maintaining kitchen efficiency, vital for every dish.</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="chef-card" data-aos="zoom-in" data-aos-delay="300">
                      <div class="chef-img">
                        <img src="assets/img/restaurant/chef-4.webp" class="img-fluid" alt="Chef Portrait">
                        <div class="social-links">
                          <a href="#"><i class="bi bi-instagram"></i></a>
                          <a href="#"><i class="bi bi-twitter-x"></i></a>
                          <a href="#"><i class="bi bi-facebook"></i></a>
                        </div>
                      </div>
                      <div class="chef-info">
                        <h4>Jonathan Williams</h4>
                        <p class="role">Head of Bar</p>
                        <p class="details">Jonathan Williams, our Head of Bar, masterfully crafts unique beverage experiences. He ensures every drink perfectly complements your meal, enhancing your visit with style.</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="chef-card" data-aos="zoom-in" data-aos-delay="350">
                      <div class="chef-img">
                        <img src="assets/img/restaurant/chef-5.webp" class="img-fluid" alt="Chef Portrait">
                        <div class="social-links">
                          <a href="#"><i class="bi bi-instagram"></i></a>
                          <a href="#"><i class="bi bi-twitter-x"></i></a>
                          <a href="#"><i class="bi bi-facebook"></i></a>
                        </div>
                      </div>
                      <div class="chef-info">
                        <h4>Isabella Romano</h4>
                        <p class="role">Bar Assistance</p>
                        <p class="details">Our Bar Assistant supports smooth bar operations by preparing ingredients, maintaining cleanliness, and ensuring timely service. Their dedication helps create a welcoming atmosphere for every guest.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </section><!-- /Chefs Section -->
@endsection