<div class="container d-flex align-items-center justify-content-between">
    <div class="logo">
    <h1><a href="{{route('beranda')}}">SIEBEN</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav id="navbar" class="navbar">
    <ul>
        <li><a class="{{url()->current() == route('fe.beranda') ? 'getstarted' : ''}} {{url()->current() == route('beranda') ? 'getstarted' : ''}} scrollto " href="{{route('fe.beranda')}}">Beranda</a></li>
        <li class="dropdown">
            <a class="{{url()->current() == route('fe.petasebaran.kecamatan') ? 'getstarted' : ''}} {{url()->current() == route('fe.petasebaran.desa') ? 'getstarted' : ''}} scrollto" href="">Peta Bencana</a>
            <ul>
                <li>
                    <a class="scrollto" href="{{route('fe.petasebaran.kecamatan')}}">Sebaran Kecamatan</a>
                </li>
                <li>
                    <a class="scrollto" href="{{route('fe.petasebaran.desa')}}">Sebaran Desa</a>
                </li>
            </ul>
        </li>
        <li><a class="nav-link scrollto" href="#petarawanbencana">Peta Rawan Bencana</a></li>
        <!-- <li><a class="{{url()->current() == route('fe.informasi_harian') ? 'getstarted' : 'nav-link'}} scrollto " href="{{route('fe.informasi_harian')}}">Informasi Harian</a></li>
        <li><a class="{{url()->current() == route('fe.infografis') ? 'getstarted' : 'nav-link'}} scrollto " href="{{route('fe.infografis')}}">Infografis Bencana</a></li> -->
        <li><a class="nav-link scrollto " data-bs-target="#popupKontak" data-bs-toggle="modal">Kontak</a></li>
        <li><a class="nav-link scrollto" href="#login">Login</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
</div>