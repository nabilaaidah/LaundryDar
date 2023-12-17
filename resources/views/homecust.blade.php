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
              <span class="text-primary">Laundry</span>Dar
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
              <a href="{{ route('customer.home', ['customerId' => $customerId]) }}" class="nav-item nav-link active">Home</a>
              <a href="{{ route('customer.orderhistory', ['customerId' => $customerId]) }}" class="nav-item nav-link">Order History</a>
              <a href="{{ route('customer.about', ['customerId' => $customerId]) }}" class="nav-item nav-link">About</a>
              <div class="nav-item dropdown">
                <a
                  href="#"
                  class="nav-link dropdown-toggle"
                  data-toggle="dropdown"
                  >Profile</a
                >
                <div class="dropdown-menu border-0 rounded-0 m-0">
                  <a href="{{ route('customer.profilecust', ['customerId' => $customerId]) }}" class="dropdown-item">My Profile</a>
                  <a href="{{ route('customer.login', ['customerId' => $customerId]) }}" class="dropdown-item">Logout</a>
                </div>
              </div>
              <a href="{{ route('customer.contact', ['customerId' => $customerId]) }}" class="nav-item nav-link">Contact</a>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
      <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="w-100" src="{{ asset('img/carousel-1.jpg') }}" alt="Image" />
            <div
              class="carousel-caption d-flex flex-column align-items-center justify-content-center"
            >
              <div class="p-3" style="max-width: 900px">
                <h4 class="text-white text-uppercase mb-md-3">
                  Laundry & Dry Cleaning Service
                </h4>
                <h1 class="display-3 text-white mb-md-4">
                  Layanan Terbaik Laundry
                </h1>
                <a
                  href="{{ route('transaction.showorderform', ['customerId' => $customerId]) }}"
                  class="btn btn-primary py-md-3 px-md-5 mt-2"
                  >Pesan Layanan</a
                >
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="w-100" src="{{ asset('img/carousel-2.jpg') }}" alt="Image" />
            <div
              class="carousel-caption d-flex flex-column align-items-center justify-content-center"
            >
              <div class="p-3" style="max-width: 900px">
                <h4 class="text-white text-uppercase mb-md-3">
                  Laundry & Dry Cleaning
                </h4>
                <h1 class="display-3 text-white mb-md-4">Staff Profesional</h1>
                <a
                  href="{{ route('transaction.showorderform', ['customerId' => $customerId]) }}"
                  class="btn btn-primary py-md-3 px-md-5 mt-2"
                  >Pesan Layanan</a
                >
              </div>
            </div>
          </div>
        </div>
        <a
          class="carousel-control-prev"
          href="#header-carousel"
          data-slide="prev"
        >
          <div class="btn btn-secondary" style="width: 45px; height: 45px">
            <span class="carousel-control-prev-icon mb-n2"></span>
          </div>
        </a>
        <a
          class="carousel-control-next"
          href="#header-carousel"
          data-slide="next"
        >
          <div class="btn btn-secondary" style="width: 45px; height: 45px">
            <span class="carousel-control-next-icon mb-n2"></span>
          </div>
        </a>
      </div>
    </div>
    <!-- Carousel End -->

    <!-- Contact Info Start -->
    <div class="container-fluid contact-info mt-5 mb-4">
      <div class="container" style="padding: 0 30px">
        <div class="row">
          <div
            class="col-md-4 d-flex align-items-center justify-content-center bg-secondary mb-4 mb-lg-0"
            style="height: 100px"
          >
            <div class="d-inline-flex">
              <i class="fa fa-2x fa-map-marker-alt text-white m-0 mr-3"></i>
              <div class="d-flex flex-column">
                <h5 class="text-white font-weight-medium">Our Location</h5>
                <p class="m-0 text-white">Jl. Keputih Perintis IA No. 42A</p>
              </div>
            </div>
          </div>
          <div
            class="col-md-4 d-flex align-items-center justify-content-center bg-primary mb-4 mb-lg-0"
            style="height: 100px"
          >
            <div class="d-inline-flex text-left">
              <i class="fa fa-2x fa-envelope text-white m-0 mr-3"></i>
              <div class="d-flex flex-column">
                <h5 class="text-white font-weight-medium">Email Us</h5>
                <p class="m-0 text-white">laundrydar@gmail.com</p>
              </div>
            </div>
          </div>
          <div
            class="col-md-4 d-flex align-items-center justify-content-center bg-secondary mb-4 mb-lg-0"
            style="height: 100px"
          >
            <div class="d-inline-flex text-left">
              <i class="fa fa-2x fa-phone-alt text-white m-0 mr-3"></i>
              <div class="d-flex flex-column">
                <h5 class="text-white font-weight-medium">Call Us</h5>
                <p class="m-0 text-white">+012 345 6789</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Contact Info End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
      <div class="container pt-0 pt-lg-4">
        <div class="row align-items-center">
          <div class="col-lg-5">
            <img class="img-fluid" src="{{ asset('img/about.jpg') }}" alt="" />
          </div>
          <div class="col-lg-7 mt-5 mt-lg-0 pl-lg-5">
            <h6 class="text-secondary text-uppercase font-weight-medium mb-3">
              Kenal Lebih Dekat LaundryDar
            </h6>
            <h1 class="mb-4">
              Kami Adalah Penyedia Laundry Berkualitas Di Keputih, Surabaya
            </h1>
            <h5 class="font-weight-medium font-italic mb-4">
              Laundry Dar adalah sebuah jasa laundry profesional yang
              berkomitmen untuk memberikan pelayanan terbaik dalam mencuci dan
              merawat pakaian Anda. Kami hadir untuk memudahkan dan menyediakan
              solusi praktis bagi Anda.
            </h5>
            <p class="mb-2">
              Laundry Dar siap menjadi mitra terpercaya Anda dalam memenuhi
              kebutuhan pencucian dan perawatan pakaian. Kami hadir untuk
              menjadikan hidup Anda lebih mudah dan nyaman. Hubungi kami
              sekarang untuk mendapatkan pengalaman laundry yang berkualitas dan
              terbaik.
            </p>
            <div class="row">
              <div class="col-sm-6 pt-3">
                <div class="d-flex align-items-center">
                  <i class="fa fa-check text-primary mr-2"></i>
                  <p class="text-secondary font-weight-medium m-0">
                    Layanan Laundry Berkualitas.
                  </p>
                </div>
              </div>
              <div class="col-sm-6 pt-3">
                <div class="d-flex align-items-center">
                  <i class="fa fa-check text-primary mr-2"></i>
                  <p class="text-secondary font-weight-medium m-0">
                    Pengiriman Cepat Ekspres.
                  </p>
                </div>
              </div>
              <div class="col-sm-6 pt-3">
                <div class="d-flex align-items-center">
                  <i class="fa fa-check text-primary mr-2"></i>
                  <p class="text-secondary font-weight-medium m-0">
                    Staff Profesional.
                  </p>
                </div>
              </div>
              <div class="col-sm-6 pt-3">
                <div class="d-flex align-items-center">
                  <i class="fa fa-check text-primary mr-2"></i>
                  <p class="text-secondary font-weight-medium m-0">
                    Jaminan Kepuasan 100%.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <!-- Services Start -->
    <div class="container-fluid pt-5 pb-3">
      <div class="container">
        <h6
          class="text-secondary text-uppercase text-center font-weight-medium mb-3"
        >
          Layanan Kami
        </h6>
        <h1 class="display-4 text-center mb-5">TOP 4 Layanan Kami</h1>
        <div class="row">
          <div class="col-lg-3 col-md-6 pb-1">
            <div
              class="d-flex flex-column align-items-center justify-content-center text-center bg-light mb-4 px-4"
              style="height: 300px"
            >
              <div
                class="d-inline-flex align-items-center justify-content-center bg-white shadow rounded-circle mb-4"
                style="width: 100px; height: 100px"
              >
                <i class="fa fa-3x fa-cloud-sun text-secondary"></i>
              </div>
              <h4 class="font-weight-bold m-0">Dry Cleaning</h4>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 pb-1">
            <div
              class="d-flex flex-column align-items-center justify-content-center text-center bg-light mb-4 px-4"
              style="height: 300px"
            >
              <div
                class="d-inline-flex align-items-center justify-content-center bg-white shadow rounded-circle mb-4"
                style="width: 100px; height: 100px"
              >
                <i class="fas fa-3x fa-soap text-secondary"></i>
              </div>
              <h4 class="font-weight-bold m-0">Wash & Laundry</h4>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 pb-1">
            <div
              class="d-flex flex-column align-items-center justify-content-center text-center bg-light mb-4 px-4"
              style="height: 300px"
            >
              <div
                class="d-inline-flex align-items-center justify-content-center bg-white shadow rounded-circle mb-4"
                style="width: 100px; height: 100px"
              >
                <i class="fa fa-3x fa-burn text-secondary"></i>
              </div>
              <h4 class="font-weight-bold m-0">Curtain Laundry</h4>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 pb-1">
            <div
              class="d-flex flex-column align-items-center justify-content-center text-center bg-light mb-4 px-4"
              style="height: 300px"
            >
              <div
                class="d-inline-flex align-items-center justify-content-center bg-white shadow rounded-circle mb-4"
                style="width: 100px; height: 100px"
              >
                <i class="fa fa-3x fa-tshirt text-secondary"></i>
              </div>
              <h4 class="font-weight-bold m-0">Suits Cleaning</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Services End -->

    <!-- Working Process Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <h6
          class="text-secondary text-uppercase text-center font-weight-medium mb-3"
        >
          Keunggulan Layanan
        </h6>
        <h1 class="display-4 text-center mb-5">Hemat</h1>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div
              class="d-flex flex-column align-items-center justify-content-center text-center mb-5"
            >
              <div
                class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4"
                style="
                  width: 150px;
                  height: 150px;
                  border-width: 15px !important;
                "
              >
                <h2 class="display-2 text-secondary m-0">1</h2>
              </div>
              <h3 class="font-weight-bold m-0 mt-2">Bersih</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div
              class="d-flex flex-column align-items-center justify-content-center text-center mb-5"
            >
              <div
                class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4"
                style="
                  width: 150px;
                  height: 150px;
                  border-width: 15px !important;
                "
              >
                <h2 class="display-2 text-secondary m-0">2</h2>
              </div>
              <h3 class="font-weight-bold m-0 mt-2">Wangi</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div
              class="d-flex flex-column align-items-center justify-content-center text-center mb-5"
            >
              <div
                class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4"
                style="
                  width: 150px;
                  height: 150px;
                  border-width: 15px !important;
                "
              >
                <h2 class="display-2 text-secondary m-0">3</h2>
              </div>
              <h3 class="font-weight-bold m-0 mt-2">Pelayanan Ramah</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div
              class="d-flex flex-column align-items-center justify-content-center text-center mb-5"
            >
              <div
                class="d-inline-flex align-items-center justify-content-center bg-white border border-light shadow rounded-circle mb-4"
                style="
                  width: 150px;
                  height: 150px;
                  border-width: 15px !important;
                "
              >
                <h2 class="display-2 text-secondary m-0">4</h2>
              </div>
              <h3 class="font-weight-bold m-0 mt-2">Hemat</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Working Process End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
      <div class="container">
        <h6
          class="text-secondary text-uppercase text-center font-weight-medium mb-3"
        >
          Testimonial
        </h6>
        <h1 class="display-4 text-center mb-5">Apa kata pelanggan ?</h1>
        <div class="owl-carousel testimonial-carousel">
          <div class="testimonial-item">
            <img
              class="position-relative rounded-circle bg-white shadow mx-auto"
              src="{{ asset('img/testimonial-1.jpg') }}"
              style="
                width: 100px;
                height: 100px;
                padding: 12px;
                margin-bottom: -50px;
                z-index: 1;
              "
              alt=""
            />
            <div class="bg-light text-center p-4 pt-0">
              <h5 class="font-weight-medium mt-5">Mustofa</h5>
              <p class="text-muted font-italic">CEO Tempe Mendoan</p>
              <p class="m-0">
                Pelayanan sangat ramah dan memberikan jaminan kepuasan kepada pelanggan.
              </p>
            </div>
          </div>
          <div class="testimonial-item">
            <img
              class="position-relative rounded-circle bg-white shadow mx-auto"
              src="{{ asset('img/testimonial-2.jpg') }}"
              style="
                width: 100px;
                height: 100px;
                padding: 12px;
                margin-bottom: -50px;
                z-index: 1;
              "
              alt=""
            />
            <div class="bg-light text-center p-4 pt-0">
              <h5 class="font-weight-medium mt-5">Nurul</h5>
              <p class="text-muted font-italic">Mahasiswa</p>
              <p class="m-0">
                Sebagai mahasiswa saya ngat terbantu dengan harga yang hemat dan pelayanan yang berkualitas.
              </p>
            </div>
          </div>
          <div class="testimonial-item">
            <img
              class="position-relative rounded-circle bg-white shadow mx-auto"
              src="{{ asset('img/testimonial-3.jpg') }}"
              style="
                width: 100px;
                height: 100px;
                padding: 12px;
                margin-bottom: -50px;
                z-index: 1;
              "
              alt=""
            />
            <div class="bg-light text-center p-4 pt-0">
              <h5 class="font-weight-medium mt-5">Joko</h5>
              <p class="text-muted font-italic">Pecinta Sisop</p>
              <p class="m-0">
                Cukup efektif dan efisien ketika seminggu tidak mencuci baju karena praktikum sisop, 
                untung ada laundrydar yang siang membantu.
              </p>
            </div>
          </div>
          <div class="testimonial-item">
            <img
              class="position-relative rounded-circle bg-white shadow mx-auto"
              src="{{ asset('img/testimonial-4.jpg') }}"
              style="
                width: 100px;
                height: 100px;
                padding: 12px;
                margin-bottom: -50px;
                z-index: 1;
              "
              alt=""
            />
            <div class="bg-light text-center p-4 pt-0">
              <h5 class="font-weight-medium mt-5">Luci</h5>
              <p class="text-muted font-italic">Ibu Rumah Tangga</p>
              <p class="m-0">
                Pakaian jadi wangi dan bersih. terima kasih laundrydar.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Testimonial End -->

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
