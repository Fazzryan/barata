@extends('frontend.layouts.app')
@push('meta-seo')
    <title>SIEBEN - Beranda</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="stylesheet" href="{{ asset('public/assets/fe/vendor/leafletjs/leaflet.css') }}" />

    <script src="{{ asset('public/assets/fe/vendor/leafletjs/leaflet.js') }}"></script>
    <style>

        #map {
            width: 100%;
            height: 85vh;
            border-radius: 10px;
            box-shadow: 0px 2px 14px -6px rgba(66, 68, 90, 1);
        }


    </style>
@endpush
@section('app_body')
    <!-- ======= Breadcrumbs Section ======= -->
    <!-- <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Peta Bencana</h2>
                <ol>
                    <li><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li>index</li>
                </ol>
            </div>
        </div>
    </section> -->
    <!-- End Breadcrumbs Section -->
    <section class="inner-page">
        <div id="map"></div>
    </section>
@endsection

@push('js')
    <script type="text/javascript">
        var data = <?php echo $data_desa; ?>;
    </script>

    <script type="text/javascript">
        
        // memunculkan posisi maps ditengah
        var map = L.map('map',{attributionControl: false}).setView([-7.3970813, 108.2098148], 10.3);

        // Add base tile layer (OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 20,
            attributionControl: false
        }).addTo(map);

        // Tambahkan layer GeoJSON Kabupaten Tasikmalaya
        var perDesaLayer = L.geoJSON(data, {
            style: function(feature) {
                return {
                    fillColor: "rgb(33, 134, 0)",
                    weight: 1,
                    opacity: 1,
                    color: 'white',
                    dashArray: '3',
                    fillOpacity: 0.7
                };
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties && feature.properties.WADMKD) {
                    var popupContent = "<b>Nama Desa:</b> " + feature.properties.WADMKD;
                    layer.bindPopup(popupContent);
                }
            }
        }).addTo(map);
    </script>
@endpush
