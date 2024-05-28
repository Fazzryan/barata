function showLayerControll(map){

    var streetmaps = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 20,
            attributionControl: false
        });
    var satelitemaps = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 20,
            attributionControl: false
        });

    var baseMaps = {
            StreetView: streetmaps,
            SateliteView: satelitemaps
        };

    L.control.layers(baseMaps).addTo(map);
    
    return baseMaps;
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