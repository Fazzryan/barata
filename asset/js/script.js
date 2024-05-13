// import data from '../lib/Batas_Wilayah_KelurahanDesa_10K_AR.json' assert { type: 'json' };

// Add an event listener to each marker to open the modal window when clicked
function onMarkerClick() {
    // Show the modal window
    let modal = document.getElementById("myModal");
    if (modal.style.display === "block") {
        modal.style.display = "none";
    } else {
        modal.style.display = "block";
    }
}

// Close the modal window when the close button or outside of the modal is clicked
function closeModal() {
    document.getElementById("myModal").style.display = "none";
}
// Pengaturan Icon untuk marker
var icon = L.icon({ iconUrl: 'asset/lib/leafletjs/images/marker-icon.png' });

//Menampilkan pusat peta, titik awal peta
var mymap = L.map('map', { zoomControl: true }).setView([-7.3283, 108.3570, 108.2145568955325], 13);

L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
}).addTo(mymap);

// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
// }).addTo(mymap);

// Menampilkan titik kordinat rumah makan ke peta
const mark = [
    {
        loc: "-7.350326168490843, 108.45728113248894",
        bencana: "Banjir",
        kabupaten: "KABUPATEN SUMEDANG",
        waktuKejadian: "Rabu,06 Maret 2024 00:00 WIB",
        waktuTerimaLaporan: "Selasa,07 Mei 2024 18:38 WIB",
        lokasiKejadian: "Desa/Kel Cihanjuang Kec.Cimanggung",
        kerusakanFasilitas: "2",
        rusakSedang: "1",
        terdampak: "1",
        link: "https://github.com/sandhikagalih"
    },
    {
        loc: "-7.332940467601141, 108.41160999690713",
        bencana: "Cuaca Ekstrem",
        kabupaten: "KOTA BANJAR",
        waktuKejadian: "Rabu,03 Januari 2024 16:00 WIB",
        waktuTerimaLaporan: "Rabu,03 Januari 2024 18:00 WIB",
        lokasiKejadian: "Desa/Kel Hegarsari Kec.Pataruman",
        kerusakanFasilitas: "2",
        rusakSedang: "1",
        terdampak: "1",
        link: "https://github.com/fazzryan"
    },
    {
        loc: "-7.323100692702516, 108.32699605926501",
        bencana: "Tanah Longsor",
        kabupaten: "KABUPATEN CIREBON",
        waktuKejadian: "Sabtu,02 Maret 2024 00:00 WIB",
        waktuTerimaLaporan: "Sabtu,02 Maret 2024 00:00 WIB",
        lokasiKejadian: "Desa/Kel Sedong Kidul Kec.Sedong",
        kerusakanFasilitas: "1",
        rusakSedang: "1",
        terdampak: "1",
        link: "https://github.com/fazzryan"
    },
    {
        loc: "-7.326563313858726, 108.35375261591189",
        bencana: "Tanah Longsor",
        kabupaten: "KOTA CIMAHI",
        waktuKejadian: "Sabtu,06 Januari 2024 17:30 WIB",
        waktuTerimaLaporan: "Sabtu,06 Januari 2024 23:30 WIB",
        lokasiKejadian: "Desa/Kel CibabatDesa/Kel Citeureup Kec.Cimahi Utara",
        kerusakanFasilitas: "4",
        rusakSedang: "2",
        terdampak: "1",
        link: "https://github.com/fazzryan"
    },
    {
        loc: "-7.325798228348295, 108.3479760545797",
        bencana: "Cuaca Extrem",
        kabupaten: "KABUPATEN SUMEDANG",
        waktuKejadian: "Kamis,01 Februari 2024 15:30 WIB",
        waktuTerimaLaporan: "Kamis,01 Februari 2024 21:20 WIB",
        lokasiKejadian: "Desa/Kel Cipacing Kec.Jatinangor",
        kerusakanFasilitas: "2",
        rusakSedang: "91",
        terdampak: "1",
        link: "https://github.com/fazzryan"
    },
    {
        loc: "-7.317122265466278, 108.36942939690685",
        bencana: "Tanah Longsor",
        kabupaten: "KABUPATEN SUMEDANG",
        waktuKejadian: "Senin,05 Februari 2024 14:45 WIB",
        waktuTerimaLaporan: "Selasa,06 Februari 2024 11:54 WIB",
        lokasiKejadian: "Desa/Kel RancamulyaDesa/Kel Girimukti Kec.Sumedang Utara",
        kerusakanFasilitas: "2",
        rusakSedang: "15",
        terdampak: "1",
        link: "https://github.com/fazzryan"
    },

];
// var koordinat = data.features[0].geometry.coordinates[0];
// var koordinat = data.features[0].properties;
// console.log(koordinat.FCODE);
// koordinat.forEach((item) => {
//     console.log(item[1]);
//     let latitude = item[1];
//     let longitude = item[0];
//     L.marker([latitude, longitude])
//         .bindPopup("<h6>ww</h6>")
//         .addTo(mymap)
//         .openPopup();
// })

function openModal(
    bencana,
    kabupaten,
    lokasiKejadian,
    waktuKejadian,
    waktuTerimaLaporan,
    kerusakanFasilitas,
    rusakSedang,
    terdampak,
    link
) {
    // Mendapatkan referensi ke elemen-elemen dalam modal
    let m_bencana = document.getElementById('bencana');
    let m_kabupaten = document.getElementById('kabupaten');
    let m_lokasiKejadian = document.getElementById('lokasi-kejadian');
    let m_waktuKejadian = document.getElementById('waktu-kejadian');
    let m_waktuTerimaLaporan = document.getElementById('waktu-terima-laporan');
    let m_kerusakanFasilitas = document.getElementById('kerusakan-fasilitas');
    let m_rusakSedang = document.getElementById('rusak-sedang');
    let m_terdampak = document.getElementById('terdampak');
    let modalLink = document.getElementById('modal-link');

    // Menetapkan nilai dari variabel ke elemen-elemen modal
    m_bencana.textContent = bencana;
    m_kabupaten.textContent = kabupaten;
    m_lokasiKejadian.textContent = lokasiKejadian;
    m_waktuKejadian.textContent = waktuKejadian;
    m_waktuTerimaLaporan.textContent = waktuTerimaLaporan;
    m_kerusakanFasilitas.textContent = kerusakanFasilitas + " Unit";
    m_rusakSedang.textContent = rusakSedang + " Unit";
    m_terdampak.textContent = terdampak + " Unit";
    modalLink.setAttribute("href", link);
}


mark.forEach((item) => {
    let locArray = item.loc.split(',').map(parseFloat);
    let latitude = locArray[0];
    let longitude = locArray[1];
    let bencana = item.bencana;
    let kabupaten = item.kabupaten;
    let lokasiKejadian = item.lokasiKejadian;
    let waktuKejadian = item.waktuKejadian;
    let waktuTerimaLaporan = item.waktuTerimaLaporan;
    let kerusakanFasilitas = item.kerusakanFasilitas;
    let rusakSedang = item.rusakSedang;
    let terdampak = item.terdampak;
    let link = item.link;
    L.marker([latitude, longitude], { icon: icon })
        .bindPopup(`
            <h6>${bencana} <br> ${waktuKejadian}</h6>
            <button onclick="openModal(
                '${bencana}', 
                '${kabupaten}', 
                '${lokasiKejadian}', 
                '${waktuKejadian}', 
                '${waktuTerimaLaporan}', 
                '${kerusakanFasilitas}', 
                '${rusakSedang}', 
                '${terdampak}', 
                '${link}'
            )" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Lihat</button>
        `)
        .addTo(mymap)
        .openPopup();
});

// mark.forEach((item) => {
//     let locArray = item.loc.split(',').map(parseFloat);
//     let title = item.title;
//     let link = item.link;
//     let latitude = locArray[0];
//     let longitude = locArray[1];
//     L.marker([latitude, longitude], { icon: icon })
//         .bindPopup('<h4>' + title + '</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, modi.</p><button onclick="onMarkerClick()" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Lihat</button>')
//         .addTo(mymap)
//         .openPopup();

//     modalTitle.textContent = title;
//     modalBody.textContent = latitude;
//     modalLink.setAttribute("href", link)

// });
// L.marker([-7.350326168490843, 108.45728113248894], { icon: icon })
//     .bindPopup('<h4>Warung Jeruk</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, modi.</p><button onclick="onMarkerClick()" class="btn btn-sm btn-primary">Detail<button/>')
//     // .bindPopup(onMarkerClick())
//     .addTo(mymap)
//     .openPopup();

// L.marker([-7.350326168490843, 108.45728113248894], { icon: icon })
// .addEventListener("click", onMarkerClick);
// layer.openPopup();
// layer.closePopup();
// marker.on('click', onMarkerClick);
// L.marker([-7.332940467601141, 108.41160999690713], { icon: icon }).bindPopup('RM Saung Mirah').addTo(mymap);
// L.marker([-7.323100692702516, 108.32699605926501], { icon: icon }).bindPopup('RM Mergosari').addTo(mymap);
// L.marker([-7.326563313858726, 108.35375261591189], { icon: icon }).bindPopup('RM Ampera').addTo(mymap);
// L.marker([-7.325798228348295, 108.3479760545797], { icon: icon }).bindPopup('RM Pujaseda').addTo(mymap);
// L.marker([-7.317122265466278, 108.36942939690685], { icon: icon }).bindPopup('Bakar Ikan Zorozoy').addTo(mymap);
// L.marker([-7.326979576289744, 108.34841103923411], { icon: icon }).bindPopup('Mie Bakso H.Oding').addTo(mymap);
// L.marker([-7.310496887166295, 108.27112641225243], { icon: icon }).bindPopup('Mie Bakso Kecamatan').addTo(mymap);

var satellite = L.tileLayer(mbUrl, {
    id: 'mapbox/satellite-v9',
    tileSize: 512, zoomOffset: -1, attribution: mbAttr
}); 