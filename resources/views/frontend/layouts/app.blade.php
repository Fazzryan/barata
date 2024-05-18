<!DOCTYPE html>
<html lang="en">

<head>
  @include('frontend.layouts.app_head')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    @include('frontend.layouts.app_navbar')
  </header><!-- End Header -->

  <main id="main">
    @yield('app_body')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    @include('frontend.layouts.app_footer')
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  @include('frontend.layouts.app_script')

</body>

</html>