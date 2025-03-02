<!DOCTYPE html>
<html l ang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>OPGI Boumerdes</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Favicons -->
    <link href="assets/img/opgi.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">
    @if(session('locale') == 'ar')
    <link href="{{ url('assets/css/ar_style.css') }}" rel="stylesheet">
    @endif

    <!-- =======================================================
  * Template Name: Gp
  * Updated: Nov 25 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <link rel="stylesheet" href="{{ asset('public/css/app.css')}}">

</head>

<body>





    <main id="main">
        <div id="app">
            <router-view></router-view>
        </div>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        @include('partials.languageSwitcher')

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>{{__('OPGI Boumerdes')}}<span>.</span></h3>
                            <p>
                            <h6>
                                {{__('Cité Administrative')}}, <br>
                               {{__('Boumerdes, Algerie')}}.<br><br>
                                <strong>{{__('Téléphone')}}:</strong><a href="tel:024795858" class="ltr-text"> {{__('+213 (0) 24 79 58 58')}} </a><br>
                                <strong>{{__('Email')}}:</strong> <a href="mailto:contact@opgi-boumerdes.dz">
                                    contact@opgi-boumerdes.dz</a><br>
                            </h6>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>{{__('Liens')}}</h4>
                        <ul>
                            <h6>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">{{__('Accueil')}} </a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">{{__('À propos')}}</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">{{__('Programmes')}}</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">{{__('Actualités')}}</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">{{__('Paiement en ligne')}}</a></li>
                            </h6>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>{{__('Nos Services')}}</h4>
                        <ul>
                            <h6>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">{{__("Appels d'offres")}}</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">{{__('Vente de locaux')}}</a></li>
                            </h6>
                        </ul>
                    </div>

                    <!-- <div class="col-lg-4 col-md-6 footer-newsletter">
              <h4>Our Newsletter</h4>
              <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
              <form action="" method="post">
                <input type="email" name="email"><input type="submit" value="Subscribe">
              </form>

            </div> -->

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                {{__("Copyright")}} &copy; <strong><span>{{__("OPGI - Boumerdes")}}</span></strong>. {{__("Tous droits réservés")}}
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
                <!-- Created by <a href="#">S.MERAH</a> -->
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @auth
    <script>
    window.token = {!!json_encode(session() -> get('token')) !!}
    //console.log(window.token);
    </script>

    @endauth

    <script>
        window.locale = {!!json_encode(session() -> get('locale')) !!}
        console.log("Locale dans le script Blade :", window.locale);
    </script>

    <script src="{{asset('js/app.js')}}"></script>


    <!-- Vendor JS Files -->
    <script src="{{ url('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{ url('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{ url('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{ url('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('assets/js/main.js')}}"></script>

    <script>
    // Initialisez AOS
    AOS.init();
    // Initialisez PureCounter
    new PureCounter();
    </script>



</body>

</html>