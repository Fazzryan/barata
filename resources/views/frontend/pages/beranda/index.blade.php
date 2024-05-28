@extends('frontend.layouts.app')
@push('meta-seo')
    <title>SIEBEN - Beranda</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="stylesheet" href="{{ asset('public/assets/fe/vendor/leafletjs/leaflet.css') }}" />

    <style>

        #map {
            width: 100%;
            height: 85vh; 
            border-radius: 10px;
            box-shadow: 0px 2px 14px -6px rgba(66, 68, 90, 1);
        }

        .title-map {
            background: #7e7e7e; /* #cb4d21 */
            padding: 5px 5px 5px 5px;
            width: 100%;
            color: #fff;
            font-size: 24px;
            font-weight: bold;
        }

        .row-data>* {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            /* padding-right: calc(var(--bs-gutter-x)* .5); */
            padding-left: calc(var(--bs-gutter-x)* .5);
            margin-top: var(--bs-gutter-y);
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
    <div id="loader"></div>
    <section id="content" class="inner-page">
        <br><br><br>
        <div id="map"></div>

        <div class="modal fade" id="popupPencarian" tabindex="1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-header">Pencarian Data Bencana</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="padding-left:40px;padding-right:20px;">
                        
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="popupLihatDetail" tabindex="1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-header">Data Kebencanaan</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="padding-left:40px;padding-right:20px;">
                            <div class="row">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td colspan="3"><div class="title-map">Lokasi Kejadian</div></td>
                                        </tr>
                                        <tr>
                                            <td style="width:20%;"><b>Kode</b></td>
                                            <td style="width:3%;"><b>:</b></td>
                                            <td><div id="ld_kode"></div></td>
                                        </tr>
                                        <tr>
                                            <td style="width:20%;"><b>Kab/Kota</b></td>
                                            <td style="width:3%;"><b>:</b></td>
                                            <td>Kabupaten Tasikmalaya</td>
                                        </tr>
                                        <tr>
                                            <td style="width:20%;"><b>Kecamatan</b></td>
                                            <td style="width:3%;"><b>:</b></td>
                                            <td><div id="ld_kecamatan"></div></td>
                                        </tr>
                                        <tr>
                                            <td style="width:20%;"><b>Desa</b></td>
                                            <td style="width:3%;"><b>:</b></td>
                                            <td><div id="ld_desa"></div></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="title-map" style="margin-top:20px;">Data Kejadian</div>
                                <div class="row col-md-12" style="padding-right:0px;margin-top:10px">
                                    <div class="col-xl-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="d-flex bd-highlight mb-2">
                                                        <div class="align-self-center mr-auto p-2 bd-highlight">
                                                            <i class="fa fa-book fa-3x danger font-small-2 float-right" style="color:#FFA87D;"></i>
                                                        </div>
                                                        <div class="ml-auto p-2 bd-highlight">
                                                            <h3 class="danger">235</h3>
                                                            <span>Kejadian Bencana</span>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="d-flex bd-highlight mb-2">
                                                        <div class="align-self-center mr-auto p-2 bd-highlight">
                                                            <i class="fa-solid fa-rupiah-sign fa-3x danger font-small-2 float-right" style="color:#FFA87D;"></i>
                                                        </div>
                                                        <div class="ml-auto p-2 bd-highlight">
                                                            <h3 class="danger">1.702.000.000</h3>
                                                            <span>Taksiran Kerugian</span>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <a id="modal-link" target="_blank" class="btn btn-sm btn-primary">Detail</a>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('public/assets/fe/vendor/leafletjs/leaflet.js') }}"></script>
    <script src="{{ asset('public/assets/fe/vendor/leafletjs/plugins/script.js') }}"></script>

    <script>
        var divId_preloader = document.getElementById('loader');
        var divId_content = document.getElementById('content');
        show_loading_page(divId_preloader, divId_content);
    </script>

    <script type="text/javascript">
        var data = <?php echo $data_peta; ?>;
    </script>

    <script type="text/javascript">

        // memunculkan posisi maps ditengah
        var map = L.map('map', {
            attributionControl: false,
        }).setView([-7.3970813, 108.2098148], 10);

        // memunculkan Pilihan Maps
        var LayerControl = showLayerControll(map);
        LayerControl.SateliteView.addTo(map); //setting default layer

        // memunculkan Tombol Tambahan
        var BtnSearch = showBtnSearch('topright','popupPencarian');
        map.addControl(new BtnSearch());

        var BtnFullScreen = showBtnFullScreen('topright');
        map.addControl(new BtnFullScreen());

        var BtnRefreshPage = showBtnRefreshPage('topright');
        map.addControl(new BtnRefreshPage());
        
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
                var kode = feature.properties.KDEPUM;
                var kecamatan = feature.properties.WADMKC;
                var desa = feature.properties.WADMKD;
                
                var id = "'"+kode+"'";
                var nm_kecamatan = "'"+kecamatan+"'";
                var nm_desa = "'"+desa+"'"

                var popupAwal = '<b>Kecamatan :</b> ' + kecamatan +'<br>'+'<b>Desa :</b> ' + desa + '<br><br>' +
                            '<Button onclick="popupLihatDetail('+id+','+nm_kecamatan+','+nm_desa+')" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#popupLihatDetail">Lihat Detail</Button>';
                layer.bindPopup(popupAwal);
            }
        }).addTo(map);

    </script>

    <script>
        function popupLihatDetail(id,kec,desa){
            document.getElementById("ld_kode").textContent  = id;
            document.getElementById("ld_kecamatan").textContent  = kec;
            document.getElementById("ld_desa").textContent  = desa;
        };
    </script>
@endpush
