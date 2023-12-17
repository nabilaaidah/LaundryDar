<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>LaundryDar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;800&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/csshome/style.css') }}" rel="stylesheet" />
  </head>

  <body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-primary py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center">
              <a class="text-white pr-3" href="">FAQs</a>
              <span class="text-white">|</span>
              <a class="text-white px-3" href="">Help</a>
              <span class="text-white">|</span>
              <a class="text-white pl-3" href="">Support</a>
            </div>
          </div>
          <div class="col-md-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
              <a class="text-white px-3" href="">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a class="text-white px-3" href="">
                <i class="fab fa-twitter"></i>
              </a>
              <a class="text-white px-3" href="">
                <i class="fab fa-linkedin-in"></i>
              </a>
              <a class="text-white px-3" href="">
                <i class="fab fa-instagram"></i>
              </a>
              <a class="text-white pl-3" href="">
                <i class="fab fa-youtube"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
      <div
        class="container-lg position-relative p-0 px-lg-3"
        style="z-index: 9"
      >
        <nav
          class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 pl-3 pl-lg-5"
        >
          <a href="" class="navbar-brand">
            <h1 class="m-0 text-secondary">
              <span class="text-primary">DRY</span>ME
            </h1>
          </a>
          <button
            type="button"
            class="navbar-toggler"
            data-toggle="collapse"
            data-target="#navbarCollapse"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="collapse navbar-collapse justify-content-between px-3"
            id="navbarCollapse"
          >
            <div class="navbar-nav ml-auto py-0">
              <a href="{{ route('customer.home', ['customerId' => $customerId]) }}" class="nav-item nav-link">Home</a>
              <a href="{{ route('customer.orderhistory', ['customerId' => $customerId]) }}" class="nav-item nav-link">Order History</a>
              <a href="{{ route('customer.about', ['customerId' => $customerId]) }}" class="nav-item nav-link">About</a>
              <div class="nav-item dropdown">
                <a
                  href="#"
                  class="nav-link dropdown-toggle active"
                  data-toggle="dropdown"
                  >Pages</a
                >
                <div class="dropdown-menu border-0 rounded-0 m-0">
                  <a href="{{ route('customer.profilecust', ['customerId' => $customerId]) }}" class="dropdown-item">My Profile</a>
                  <a href="{{ route('customer.logout', ['customerId' => $customerId]) }}" class="dropdown-item active">Log Out</a>
                </div>
              </div>
              <a href="{{ route('customer.contact', ['customerId' => $customerId]) }}" class="nav-item nav-link">Contact</a>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!-- Navbar End -->

    <!-- Footer Start -->
    <div
      class="container-fluid bg-primary text-white mt-5 pt-5 px-sm-3 px-md-5"
    >
      <div class="row pt-5">
        <div class="col-lg-3 col-md-6 mb-5">
          <a href=""
            ><h1 class="text-secondary mb-3">
              <span class="text-white">Laundry</span>Dar
            </h1></a
          >
          <p>
            Kami mengutamakan kepercayaan pelanggan, privasi, dan keamanan.
            Setiap pakaian yang Anda serahkan kepada kami akan ditangani dengan
            hati-hati dan keamanan yang terjamin.
          </p>
          <div class="d-flex justify-content-start mt-4">
            <a
              class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-twitter"></i
            ></a>
            <a
              class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a
              class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-linkedin-in"></i
            ></a>
            <a
              class="btn btn-outline-light rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-instagram"></i
            ></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
          <h4 class="text-white mb-4">Hubungi Kami</h4>
          <p>Hubungi kami untuk layanan LaundryDar</p>
          <p>
            <i class="fa fa-map-marker-alt mr-2"></i>Jl. Keputih Perintis IA No.
            42A
          </p>
          <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
          <p><i class="fa fa-envelope mr-2"></i>laundrydar@gmail.com</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
          <h4 class="text-white mb-4">Quick Links</h4>
          <div class="d-flex flex-column justify-content-start">
            <a class="text-white mb-2" href="#"
              ><i class="fa fa-angle-right mr-2"></i>Home</a
            >
            <a class="text-white mb-2" href="#"
              ><i class="fa fa-angle-right mr-2"></i>About Us</a
            >
            <a class="text-white" href="#"
              ><i class="fa fa-angle-right mr-2"></i>Contact Us</a
            >
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
          <h4 class="text-white mb-4">Newsletter</h4>
          <form action="">
            <div class="form-group">
              <input
                type="text"
                class="form-control border-0"
                placeholder="Nama"
                required="required"
              />
            </div>
            <div class="form-group">
              <input
                type="email"
                class="form-control border-0"
                placeholder="Email"
                required="required"
              />
            </div>
            <div>
              <button
                class="btn btn-lg btn-secondary btn-block border-0"
                type="submit"
              >
                Submit Now
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="container-fluid bg-dark text-white py-4 px-sm-3 px-md-5">
      <p class="m-0 text-center text-white">
        &copy;
        <a class="text-white font-weight-medium" href="#">LaundryDar</a>. All
        Rights Reserved.

        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        <!-- Designed by
        <a class="text-white font-weight-medium" href="https://htmlcodex.com"
          >HTML Codex</a
        > -->
      </p>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"
      ><i class="fa fa-angle-double-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('js/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('js/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src=" {{ asset('js/main.js') }}"></script>
  </body>
</html>
