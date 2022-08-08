<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TheEvent Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('image/favicon.png')}}" rel="icon">
  <link href="{{asset('image/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap-new/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: TheEvent - v4.7.0
  * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @include('frontend.component.new-navbar')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @include('frontend.component.hero-section')
  <!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    @include('frontend.component.about-section')
    <!-- End About Section -->

    <!-- ======= Speakers Section ======= -->
    @include('frontend.component.blog-section', $blogs)
    <!-- End Speakers Section -->

    <!-- ======= Schedule Section ======= -->
    @include('frontend.component.schedule-section', $schedules)
    <!-- End Schedule Section -->

    <!-- ======= Venue Section ======= -->
    @include('frontend.component.venue-section')<!-- End Venue Section -->

    <!-- ======= Hotels Section ======= -->
    @include('frontend.component.hotel-section')
    <!-- End Hotels Section -->

    <!-- ======= Gallery Section ======= -->
    @include('frontend.component.gallery-section')
    <!-- End Gallery Section -->

    <!-- ======= Supporters Section ======= -->
   @include('frontend.component.support-section')<!-- End Sponsors Section -->

    <!-- =======  F.A.Q Section ======= -->
    @include('frontend.component.faq', $faq)
    <!-- End  F.A.Q Section -->

    <!-- ======= Subscribe Section ======= -->
    {{-- @include('frontend.component.subscribe') --}}
    <!-- End Subscribe Section -->

    <!-- ======= Buy Ticket Section ======= -->
    {{-- @include('frontend.component.buy-ticket') --}}
    <!-- End Buy Ticket Section -->

    <!-- ======= Contact Section ======= -->
    @include('frontend.component.contact')
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('frontend.component.footer')
  <!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('vendor/aos/aos.js')}}"></script>
  <script src="{{asset('vendor/bootstrap-new/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>

</body>

</html>
