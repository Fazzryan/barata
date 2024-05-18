<div class="container d-flex align-items-center justify-content-between">
    <div class="logo">
    <h1><a href="{{route('beranda')}}">AppMaps</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    </div>

    <nav id="navbar" class="navbar">
    <ul>
        <li><a class="{{url()->current() == route('fe.beranda') ? 'getstarted' : ''}} {{url()->current() == route('beranda') ? 'getstarted' : ''}} scrollto " href="{{route('fe.beranda')}}">Beranda</a></li>
        <li><a class="{{url()->current() == route('fe.informasi_harian') ? 'getstarted' : 'nav-link'}} scrollto " href="{{route('fe.informasi_harian')}}">Informasi Harian</a></li>
        <li><a class="{{url()->current() == route('fe.infografis') ? 'getstarted' : 'nav-link'}} scrollto " href="{{route('fe.infografis')}}">Infografis Bencana</a></li>
        <li><a class="nav-link scrollto " href="#kontak">Kontak</a></li>
        <li><a class="nav-link scrollto" href="#login">Login</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
</div>