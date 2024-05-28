<!DOCTYPE html>
<html lang="en">

<head>
  @include('frontend.layouts.app_head')
</head>

<body id="body">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    @include('frontend.layouts.app_navbar')
  </header><!-- End Header -->

  <main id="main">
    @yield('app_body')
    <section>
      <div class="modal fade" id="popupKontak" tabindex="1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-header">Kontak BPBD Kab.Tasikmalaya</h5>
                </div>
                <div class="modal-body">
                    <div class="row" style="padding-left:40px;padding-right:20px;">
                      <p>
                        <strong>ALAMAT KANTOR</strong><br>
                        BPBD KABUPATEN TASIKMALAYA<br>
                        Jl. Otto Iskandardinata No.19,<br>
                        Empangsari, Kec. Tawang, Kota. Tasikmalaya,<br>
                        Jawa Barat 46113<br><br>

                        <strong>KONTAK</strong><br>
                        Call center. 082120594513<br>
                        Telp. (0265) 334 111<br>
                        pusdalopskabtasik@gmail.com<br>
                        bpbdkabtasikmalaya.id@gmail.com
                      </p>
              
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="fixed-bottom">
    @include('frontend.layouts.app_footer')
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  @include('frontend.layouts.app_script')

</body>

</html>