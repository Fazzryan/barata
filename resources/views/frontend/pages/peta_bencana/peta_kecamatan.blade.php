@extends('frontend.layouts.app')
@push('meta-seo')
    <title>SIEBEN - Peta Kecamatan</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="stylesheet" href="{{ asset('public/assets/fe/vendor/leafletjs/leaflet.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/fe/vendor/datepicker/css/datepicker.css') }}" />

    <link rel="stylesheet" href="{{ asset('public/assets/fe/vendor/dselect/dist/css/dselect.css') }}" />
    <style>

        #map {
            width  : 100%;
            height : 87vh;
            margin-top:70px;
            /* border-radius: 10px;
            box-shadow: 0px 2px 14px -6px rgba(66, 68, 90, 1); */
        }

        body { 
            width  : 100%;
            height : 100%;
            background-color: #eff2f8;
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
        <div id="map"></div>

        <div class="modal fade" id="popupPencarian" tabindex="1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-header">Pencarian Data Bencana</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="padding-left:20px;padding-right:20px;">
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tgl_awal" class="form-label">Tgl Awal</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                            <input name="tgl_awal" id="tgl_awal" placeholder="tanggal awal" type="text" class="form-control datepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tgl_akhir" class="form-label">Tgl Akhir</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                            <input name="tgl_akhir" id="tgl_akhir" placeholder="tanggal akhir" type="text" class="form-control datepicker">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12" style="margin-top:20px;">
                                <div class="col-md-6">
                                    <label for="cari_kecamatan" class="form-label">Kecamatan</label>
                                    <select class="form-select" id="cari_kecamatan" name="cari_kecamatan" data-dselect-search="true" data-dselect-max-height="250px">
                                        <option value="semua" selected>== semua kecamatan ==</option>
                                        @foreach($kecamatan as $val_kecamatan)
                                        <option value="{{$val_kecamatan->id}}">{{ucwords(strtolower($val_kecamatan->nm_kecamatan))}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="cari_jnsbencana" class="form-label">Jenis Bencana</label>
                                    <select class="form-select" id="cari_jnsbencana" name="cari_jnsbencana" data-dselect-search="true" data-dselect-max-height="250px">
                                        <option value="semua" selected>== semua jenis bencana ==</option>
                                        @foreach($jenis_bencana as $val_jenisbencana)
                                        <option value="{{$val_jenisbencana->id}}">{{ucwords(strtolower($val_jenisbencana->jns_bencana))}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-sm btn-success" data-bs-dismiss="modal">Cari Data</button>
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
                                                            <h3 class="danger"><div id="ld_jmlkejadian"></div></h3>
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
                                                            <h3 class="danger"><div id="ld_jmlkerugian"></div></h3>
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
    <script src="{{ asset('public/assets/fe/vendor/datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('public/assets/fe/vendor/dselect/dist/js/dselect.js') }}"></script>
    
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
            zoomControl: false
        }).setView([-7.3970813, 108.2098148], 10);

        // memunculkan Pilihan Maps
        var LayerControl = showLayerControll(map);
        LayerControl.SateliteView.addTo(map); //setting default layer

        // memunculkan Tombol Tambahan
        var ZoomControll = showZoomControll('bottomright');
        ZoomControll.addTo(map);

        var BtnSearch = showBtnSearch('topright','popupPencarian');
        map.addControl(new BtnSearch());

        var BtnFullScreen = showBtnFullScreen('topright');
        map.addControl(new BtnFullScreen());

        var BtnRefreshPage = showBtnRefreshPage('topright');
        map.addControl(new BtnRefreshPage());

        var InfoBencana = showInfoBencana('topleft');
        map.addControl(new InfoBencana());

        var IndeksResiko = showIndeksResiko('topleft');
        map.addControl(new IndeksResiko());

        var url_logo = "{{ URL::asset('public/assets/fe/img/a_logo_bpbdkabtasik.png') }}";
        var ConnectionTime = showConnectionTime('topleft',url_logo);
        map.addControl(new ConnectionTime());

        var ic_signal = document.getElementById("ic_signal");
        testConnection(ic_signal);
        
        // Tambahkan layer GeoJSON Kabupaten Tasikmalaya
        var perDesaLayer = L.geoJSON(data, {
            style: function(feature) {
                return {
                    weight: 1,
                    opacity: 1,
                    color: '#800026',
                    dashArray: '3',
                    fillOpacity: 0.7,
                    fillColor: getColor(feature.properties.total_kejadian)
                };
            },
            onEachFeature: function(feature, layer) {

                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                    // click: bindPopup
                });

                var kd_kecamatan = feature.properties.KDCPUM;
                var nm_kecamatan = feature.properties.nm_kecamatan;
                
                var id = "'"+kd_kecamatan+"'";
                
                var popupAwal = '<b>Kecamatan :</b> ' + nm_kecamatan + '<br><br>' +
                            '<Button onclick="popupLihatDetail('+id+')" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#popupLihatDetail">Lihat Detail</Button>';
                layer.bindPopup(popupAwal);
            }
        }).addTo(map);

        function highlightFeature(e) {
            var layer = e.target;

            layer.setStyle({
                weight: 2,
                color: '#800026',
                dashArray: '',
                fillOpacity: 0.7
            });

            if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                layer.bringToFront();
            }
        }

        function resetHighlight(e) {
            perDesaLayer.resetStyle(e.target);
        }

        function getColor(d) {
            return d > 30 ? '#ff0000' :
                d > 15  ? 'rgb(255, 143, 0)' :
                d > 0   ? '#FED976' : 'rgb(33, 134, 0)';
        }

    </script>

    <script>
        function popupLihatDetail(id){
            data.features.forEach((feature) => {
                var KDCPUM = feature.properties.KDCPUM;
                if (KDCPUM == id) {
                    document.getElementById("ld_kode").textContent  = id;
                    document.getElementById("ld_kecamatan").textContent  = feature.properties.nm_kecamatan;
                    document.getElementById("ld_jmlkejadian").textContent  = feature.properties.total_kejadian;
                    document.getElementById("ld_jmlkerugian").textContent  = feature.properties.total_taksiran;
                }
            });

            
        };
    </script>

    <script type="text/javascript">
        $(function(){
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });

        dselect(document.querySelector('#cari_kecamatan'));
        dselect(document.querySelector('#cari_jnsbencana'));
    </script>
@endpush
