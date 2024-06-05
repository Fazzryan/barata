function showLayerControll(map){

    var mapreal = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 20,
            attributionControl: false,
            filter: 'defaultToDarkFilter'
        });
    var streetmaps = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 20,
            attributionControl: false
        });
    var satelitemaps = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 20,
            attributionControl: false
        });

    var baseMaps = {
            RealView: mapreal,
            StreetView: streetmaps,
            SateliteView: satelitemaps
        };

    L.control.layers(baseMaps).addTo(map);
    
    return baseMaps;
}

function showZoomControll(posisi){
    let zoomControll = L.control.zoom({
        position: posisi
    });

    return zoomControll;
}

function showBtnSearch(posisi,id_modal){
    let btnPencarian = L.Control.extend({
        options: {
            position: posisi
        },
        onAdd(map) {
            var class_center = 'd-flex justify-content-center align-items-center';
            let div = L.DomUtil.create('div', 'leaflet-control-layers leaflet-control ' + class_center);

            div.style.backgroundColor = 'white';
            div.style.width = '48px';
            div.style.height = '44px';
            div.style.cursor = 'pointer';
            

            var fa_icon = L.DomUtil.create('i','fa fa-search fa-2xl');
            div.appendChild(fa_icon);

            div.onclick = function() {
                $('#'+id_modal).modal('show')
            };

            return div;
        }
    });

    return btnPencarian;
}

function showBtnFullScreen(posisi){
    let btnFullScreen = L.Control.extend({
        options: {
            position: posisi
        },
        onAdd(map) {
            var class_center = 'd-flex justify-content-center align-items-center';
            let div = L.DomUtil.create('div', 'leaflet-control-layers leaflet-control ' + class_center);
            div.style.backgroundColor = 'white';
            div.style.width = '48px';
            div.style.height = '44px';
            div.style.margin = '0px 10px';
            div.style.cursor = 'pointer';

            var fa_icon = L.DomUtil.create('i','fa fa-expand fa-2xl');
            fa_icon.setAttribute('id', 'icfullscreen');
            div.appendChild(fa_icon);

            div.onclick = function() {
                var body = document.getElementById("body");

                var icfullscreen = document.getElementById("icfullscreen");
                icfullscreen.remove();

                if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
                
                    if (body.requestFullScreen) {
                        body.requestFullScreen();
                    } else if (body.mozRequestFullScreen) {
                        body.mozRequestFullScreen();
                    } else if (body.webkitRequestFullScreen) {
                        body.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
                    } else if (body.msRequestFullscreen) {
                        body.msRequestFullscreen();
                    }

                    var fa_icon_new = L.DomUtil.create('i','fa fa-expand-alt fa-2xl');
                    fa_icon_new.setAttribute('id', 'icfullscreen');
                    div.appendChild(fa_icon_new);

                } else {

                    if (document.cancelFullScreen) {
                        document.cancelFullScreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if (document.webkitCancelFullScreen) {
                        document.webkitCancelFullScreen();
                    } else if (document.msExitFullscreen) {
                        document.msExitFullscreen();
                    }

                    var fa_icon_new = L.DomUtil.create('i','fa fa-expand fa-2xl');
                    fa_icon_new.setAttribute('id', 'icfullscreen');
                    div.appendChild(fa_icon_new);
                    
                }
            };

            return div;
        }
    });

    return btnFullScreen;
}

function showBtnRefreshPage(posisi){
    let btnRefresh = L.Control.extend({
        options: {
            position: posisi
        },
        onAdd(map) {
            var class_center = 'd-flex justify-content-center align-items-center';
            let div = L.DomUtil.create('div', 'leaflet-control-layers leaflet-control ' + class_center);
            div.style.backgroundColor = 'white';
            div.style.width = '48px';
            div.style.height = '44px';
            div.style.margin = '0px 10px';
            div.style.cursor = 'pointer';

            var fa_icon = L.DomUtil.create('i','fa fa-refresh fa-2xl');
            div.appendChild(fa_icon);

            div.onclick = function() {
                window.location.reload();
            };

            return div;
        }
    });

    return btnRefresh;
}

function showInfoBencana(posisi){
    let infoBencana = L.Control.extend({
        options: {
            position: posisi
        },
        onAdd(map) {
            var class_center = 'd-flex justify-content-center align-items-center';
            let div = L.DomUtil.create('div', 'leaflet-control-layers leaflet-control ' + class_center);
            div.style.backgroundColor = 'white';
            div.style.width = '210px';
            div.style.height = '280px';
            div.style.margin = '10px 0px 0px 10px';
            div.style.cursor = 'pointer';

            div.onclick = function() {
                // window.location.reload();
            };

            return div;
        }
    });

    return infoBencana;
}

function showIndeksResiko(posisi){
    let indeksResiko = L.Control.extend({
        options: {
            position: posisi
        },
        onAdd(map) {
            var class_center = 'd-flex justify-content-center align-items-center';
            var class_column_center = 'd-flex flex-column align-items-center';
            let div = L.DomUtil.create('div', 'leaflet-control-layers leaflet-control ');
            div.style.backgroundColor = 'white';
            div.style.width = '210px';
            div.style.height = '65px';
            div.style.margin = '5px 10px 1px 10px';

            var div_indeksresiko = L.DomUtil.create('div', '');
                var div_title = L.DomUtil.create('div', '');
                    div_title.setAttribute('id', 'id_title_indeksresiko');
                    div_title.style.width = '200px';
                    div_title.style.fontSize = '10pt';
                    div_title.innerHTML = "<center>::Legenda::</center>";                 
                    div_indeksresiko.appendChild(div_title);

                var div_content = L.DomUtil.create('div', '');
                    div_content.setAttribute('id', 'id_content_indeksresiko');
                    div_content.style.fontSize = '7pt';
                    div_content.style.width = '210px';
                    // div_content.style.fontWeight = 'bold';
                    div_content.innerHTML = "<b>Indeks Resiko :</b><br>"+
                        "<div class='row row-cols-4'>"+
                            "<div class='col-3 float-start' style='padding:0px 0px 0px 14px;'><i class='foo' style='background:red;'></i>Tinggi</div>"+
                            "<div class='col-3 float-start' style='padding:0px 0px 0px 0px;'><i class='foo' style='background:rgb(255, 143, 0);'></i>Sedang</div>"+
                            "<div class='col-3 float-start' style='padding:0px 0px 0px 0px;'><i class='foo' style='background:#FED976;'></i>Rendah</div>"+
                            "<div class='col-2 float-start' style='padding:0px 0px 0px 0px;'><i class='foo' style='background:rgb(33, 134, 0);'></i>Nol</div>"+
                        "</div>";
                    
                    div_indeksresiko.appendChild(div_content);

                div_indeksresiko.style.width = '100px';
                div_indeksresiko.style.height = '50px';
                div_indeksresiko.style.margin = '5px 5px';
            div.appendChild(div_indeksresiko);

            div.onclick = function() {
                // window.location.reload();
            };

            return div;
        }
    });

    return indeksResiko;
}

function showConnectionTime(posisi,logo){
    let connectionTime = L.Control.extend({
        options: {
            position: posisi
        },
        onAdd(map) {
            var class_start = 'd-flex justify-content-start align-items-center';
            var class_center = 'd-flex justify-content-center align-items-center';
            var class_column_center = 'd-flex flex-column align-items-center';
            let div = L.DomUtil.create('div', 'leaflet-control-layers leaflet-control ' + class_start);
            div.style.backgroundColor = 'white';
            div.style.width = '210px';
            div.style.height = '65px';
            div.style.margin = '1px 10px 25px 10px';

            var div_signal = L.DomUtil.create('div', class_center);
                var fa_icon_signal = L.DomUtil.create('i','fa fa-signal fa-3x');
                fa_icon_signal.setAttribute('id', 'ic_signal');
                  
                var cek_signal = cekConnection(); 
                if (cek_signal == "online") {
                    fa_icon_signal.style.color = "green";
                }else{
                    fa_icon_signal.style.color = "red";
                }          
                div_signal.appendChild(fa_icon_signal);

                div_signal.style.width = '50px';
                div_signal.style.height = '50px';
                div_signal.style.margin = '0px 0px 0px 8px';
            div.appendChild(div_signal);

            var ic_bpbd = L.DomUtil.create('img','img-bpbd');
                ic_bpbd.src = logo;
                ic_bpbd.style.width = '50px';
                ic_bpbd.style.height = '50px';
                ic_bpbd.style.margin = '0px 0px 0px 3px';
            div.appendChild(ic_bpbd);

            var div_datetime = L.DomUtil.create('div', class_column_center);
                var div_date = L.DomUtil.create('div', 'p-1');
                    div_date.setAttribute('id', 'id_tgl_now');
                    div_date.style.fontSize = '10pt';
                    div_date.style.fontWeight = 'bold';
                    setInterval(function(){
                        var currentDate = getDateTime()[0].date;
                        div_date.innerHTML = currentDate;
                    }, 1000);                    
                div_datetime.appendChild(div_date);

                var div_time = L.DomUtil.create('div', '');
                    div_time.setAttribute('id', 'id_waktu_now');
                    div_time.style.fontSize = '10pt';
                    div_time.style.fontWeight = 'bold';
                    setInterval(function(){
                        var currentTime = getDateTime()[0].time;
                        div_time.innerHTML = currentTime;
                    }, 1000); 
                div_datetime.appendChild(div_time);

                div_datetime.style.width = '100px';
                div_datetime.style.height = '50px';
                div_datetime.style.margin = '0px 8px 0px 8px';
            div.appendChild(div_datetime);
            

            div.onclick = function() {
                // window.location.reload();
            };

            return div;
        }
    });

    return connectionTime;

    function getDateTime() {
        var now     = new Date(); 
        var year    = now.getFullYear();
        var month   = now.getMonth(); 
        var day     = now.getDate();

        var hour    = now.getHours();
        var minute  = now.getMinutes();
        var second  = now.getSeconds(); 

        switch(month) {
            case 0: month = "Jan"; break;
            case 1: month = "Feb"; break;
            case 2: month = "Mar"; break;
            case 3: month = "Apr"; break;
            case 4: month = "Mei"; break;
            case 5: month = "Jun"; break;
            case 6: month = "Jul"; break;
            case 7: month = "Agu"; break;
            case 8: month = "Sep"; break;
            case 9: month = "Okt"; break;
            case 10: month = "Nov"; break;
            case 11: month = "Des"; break;
        }

        if(day.toString().length == 1) {
             day = '0'+day;
        }   
        if(hour.toString().length == 1) {
             hour = '0'+hour;
        }
        if(minute.toString().length == 1) {
             minute = '0'+minute;
        }
        if(second.toString().length == 1) {
             second = '0'+second;
        } 
    
        var arr_datetime = []; 
        arr_datetime.push({ 
            "date": day+' '+month+' '+year, 
            "time":hour+':'+minute+':'+second 
        });
    
        return arr_datetime;
    }

    function cekConnection() {
        let status = navigator.onLine ? "online" : "offline";
        return status;
    }

    
}

function testConnection(id_iconsignal) {
    window.addEventListener('load', function() {
        function updateOnlineStatus(event) {
            let condition;
            let status = navigator.onLine ? "online" : "offline";
            if (condition = navigator.onLine) {
                id_iconsignal.style.color = "green"; 
                // alert(`Anda ${status}`); //online
            } else {
                // alert(`Anda ${status}`); // offline
                id_iconsignal.style.color = "red"; 
            }
        }
        window.addEventListener('online', updateOnlineStatus);
        window.addEventListener('offline', updateOnlineStatus);
    });
}


