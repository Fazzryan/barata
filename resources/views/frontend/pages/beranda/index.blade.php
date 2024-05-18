@extends('frontend.layouts.app')
@push('meta-seo')
<title>AppMaps - Beranda</title>
<meta content="" name="description">
<meta content="" name="keywords">

<link rel="stylesheet" href="{{asset('public/assets/fe/vendor/leafletjs/leaflet.css')}}"/>

<script src="{{asset('public/assets/fe/vendor/leafletjs/leaflet.js')}}"></script>

@endpush
@section('app_body')
<!-- ======= Breadcrumbs Section ======= -->
<!-- <section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Peta Bencana</h2>
            <ol>
                <li><a href="{{route('beranda')}}">Beranda</a></li>
                <li>index</li>
            </ol>
        </div>
    </div>
</section> -->
<!-- End Breadcrumbs Section -->
<br>
<section class="inner-page">
    <div class="container">
        <div id="map"></div>
        test
    </div>
</section>
@endsection

@push('js')
<script type="text/javascript">
    var data = <?php echo $data_desa; ?>;
</script>

<script type="text/javascript">
    // Create a map centered at a specific location
    var map = L.map('map').setView([-7.55, 108.22], 10);

    // Add base tile layer (OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
    }).addTo(map);
    // Tambahkan layer GeoJSON Kabupaten Tasikmalaya

    var perDesaLayer = L.geoJSON(data, {
        style: function (feature) {
            return {
                fillColor: "#ff7800",
                weight: 1,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7
            };
        },
        onEachFeature: function (feature, layer) {
            if (feature.properties && feature.properties.WADMKD) {
                var popupContent = "<b>Nama Desa:</b> " + feature.properties.WADMKD;
                layer.bindPopup(popupContent);
            }
        }
    }).addTo(map);

</script>
@endpush