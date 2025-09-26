<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Pizzas Order system</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('customer/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('customer/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

  {{-- font awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


  <!-- Vendor CSS Files -->
  <link href="{{ asset('customer/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('customer/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('customer/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('customer/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('customer/assets/css/main.css') }}" rel="stylesheet">
  @yield('styles')

  {{-- Custom CSS --}}

  {{-- Bootstrap CDN --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

</head>

<body class="index-page">
{{-- Header Start --}}
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-evenly ">

      <a href="#" class="logo d-flex align-items-center text-decoration-none ">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        {{-- <img src="{{ asset('customer/assets/img/logo.webp') }}" alt=""> --}}
        {{-- <i class="bi bi-fork-knife"></i> --}}
        <i class="fa-solid fa-pizza-slice"></i>
        <h1 class="sitename">Laravelizza</h1>
      </a>

      <nav id="navmenu" class="navmenu ">

        <ul>
                    <li><a href="{{ route('customerHome') }}" class="{{ request()->routeIs('customerHome') ? 'active' : '' }} text-decoration-none" >Home</a></li>
                    <li><a href="{{ route('customerMenu') }}" class="{{ request()->routeIs('customerMenu') ? 'active' : '' }} text-decoration-none">Menu</a></li>
                    <li><a href="{{ route('customerReservation') }}" class="{{ request()->routeIs('customerReservation') ? 'active' : '' }} text-decoration-none">Make a reservation</a></li>
                    <li><a href="{{ route('customerBookingList') }}" class="{{ request()->routeIs('customerBookingList') ? 'active' : '' }} text-decoration-none">Booking</a></li>

                    <li><a href="{{ route('customerCart') }}" class="{{ request()->routeIs('customerCart') ? 'active' : '' }} text-decoration-none">Cart</a></li>
                    <li><a href="{{ route('customerOrderList') }}" class="{{ request()->routeIs('customerOrderList') ? 'active' : '' }} text-decoration-none">Order</a></li>
                    <li><a href="{{ route('customerChefs') }}" class="{{ request()->routeIs('customerChefs') ? 'active' : '' }} text-decoration-none">Chefs</a></li>
                    <li><a href="{{ route('customerAbout') }}" class="{{ request()->routeIs('customerAbout') ? 'active' : '' }} text-decoration-none">About</a></li>
                    <li><a href="{{ route('customerContact') }}" class="{{ request()->routeIs('customerContact') ? 'active' : '' }} text-decoration-none me-5">Contact</a></li>
                    {{-- <li><a href="{{ route('customerLocation') }}" class="{{ request()->routeIs('customerLocation') ? 'active' : '' }} text-decoration-none">Location</a></li> --}}
                {{-- <div class="m-1 col-4 d-flex justify-content-end align-items-center">

                </div> --}}
        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <div class="navmenu">
        <ul>
            <li class="dropdown"><a href="{{ route('customerProfile') }}">
                @if(auth()->user()->profile == null)
                <img class="border border-white rounded-circle" style="object-fit: cover; width: 40px; height: 40px;"  src="{{ asset('uploads/userdef/default-user-icon-33.jpg') }}" alt=""><i class="bi bi-chevron-down toggle-dropdown"></i></a>
                @else
                <img class="border border-white rounded-circle" style="object-fit: cover; width: 45px; height: 45px;" src="{{ asset('uploads/profileImg/'.auth()->user()->profile) }}" alt=""><i class="bi bi-chevron-down toggle-dropdown"></i></a>
                @endif

                <ul>
                  <li><a href="{{ route('customerProfile') }}" class=" text-decoration-none">Profile</a></li>
                  <li><a href="{{ route('customerChangePasswordPage') }}" class=" text-decoration-none">Change Password</a></li>
                  {{-- <li><a href="#" class=" text-decoration-none">Dropdown 3</a></li> --}}
                  <li class=" d-flex justify-content-center">
                    <form action="{{ route('logout') }}" method="Post">
                        @csrf
                        <button class="btn-getstarted btn-sm d-none d-sm-block" type="submit" >Logout</button></li>
                    </form>

                </ul>
            </li>
        </ul>
      </div>
      {{-- <a class="btn-getstarted d-none d-sm-block" href="#book-a-table">Logout</a> --}}
    </div>
  </header>
  {{-- Header End --}}
  @yield('contents');
  {{-- Footer Start --}}
  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center text-decoration-none">
            <span class="sitename">Laravelizza</span>
          </a>
          <p>At Laravelizza, we believe every great meal starts with great ingredients and ends with satisfied smiles. From our hand-tossed dough to our signature sauces and premium toppings, every pizza is a labor of love. Whether you're dining in, taking out, or ordering online—flavor is guaranteed.

          </p>
          <div class="mt-4 social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a class=" text-decoration-none" href="{{ route('customerHome') }}">Home</a></li>
            <li><a class=" text-decoration-none" href="{{ route('customerAbout') }}">About us</a></li>
            <li><a class=" text-decoration-none" href="#">Services</a></li>
            <li><a class=" text-decoration-none" href="#">Terms of service</a></li>
            <li><a class=" text-decoration-none" href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a class=" text-decoration-none" href="#">🍕 Fresh Pizza</a></li>
            <li><a class=" text-decoration-none" href="#">🥤 Drinks</a></li>
            <li><a class=" text-decoration-none" href="#">🍰 Desserts</a></li>
            <li><a class=" text-decoration-none" href="#">🛵 Fast Delivery</a></li>
            <li><a  class=" text-decoration-none"href="#">❤️ Customer Care</a></li>
          </ul>
        </div>

        <div class="text-center col-lg-3 col-md-12 footer-contact text-md-start">
          <h4>Contact Us</h4>
          <p>29 Dibuk Rd, Talad Yai</p>
          <p>Mueang Phuket District, Phuket 83000</p>
          <p>Thailand</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+ 66 99504 5447</span></p>
          <p><strong>Email:</strong> <span>terainfo@example.com</span></p>
        </div>

      </div>
    </div>

    <div class="container mt-4 text-center copyright">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Laravelizza</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('customer/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('customer/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('customer/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('customer/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('customer/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('customer/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('customer/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('customer/assets/js/main.js') }}"></script>

  {{-- Bootstrap  --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  <!-- jQuery (CDN) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- SweetAlert2 (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- JQuery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function loadFile(event){
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('output');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>


  @yield('scripts');



</body>

</html>
