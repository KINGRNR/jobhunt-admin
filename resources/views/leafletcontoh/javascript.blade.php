
<script src="assets/js/quickact.js"></script>

<script type="text/javascript">
    APP_URL = "{{ getenv('APP_URL') }}/";
    var form = 'formExample';
    $(() => {
        init()

    })
    init = async () => {
        await mapInit();
        quick.unblockPage(500);
    }
    // mapInit = () => {
    // var map = L.map('map').setView([0, 0], 2); // Atur tampilan awal ke peta kosong dengan zoom 2.

    // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    // }).addTo(map);

    // var markers = L.layerGroup().addTo(map); // Buat grup lapisan untuk marker.

    // // Fungsi untuk menambahkan marker pada koordinat yang diinginkan
    // function addMarkerAtCoordinates(lat, lng) {
    //     var marker = L.marker([lat, lng]).addTo(markers); // Tambahkan marker pada koordinat yang diberikan.

    //     // Fungsi untuk melakukan geokoding
    //     function reverseGeocode(lat, lng, marker) {
    //         var url = 'https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + lat + '&lon=' + lng;
    //         fetch(url)
    //             .then(response => response.json())
    //             .then(data => {
    //                 if (data.display_name) {
    //                     marker.bindPopup(data.display_name).openPopup();
    //                 }
    //             })
    //             .catch(error => {
    //                 console.error('Error geocoding:', error);
    //             });
    //     }

    //     // Panggil fungsi geokoding
    //     reverseGeocode(lat, lng, marker);
    // }
    //     addMarkerAtCoordinates(-7.982420057209873, 112.62700796127321);
    // }

    // function reverseGeocode(lat, lng, marker) {
    //     var url = 'https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + lat + '&lon=' + lng;
    //     fetch(url)
    //         .then(response => response.json())
    //         .then(data => {
    //             if (data.display_name) {
    //                 marker.bindPopup(data.display_name).openPopup();
    //             }
    //         })
    //         .catch(error => {
    //             console.error('Error geocoding:', error);
    //         });
    // }
    mapInit = () => {
           var a = '#latitude'
        var b = '#longitude'
        quick.leafletMapSelector('map', a, b);
        $('#clickme').removeAttr('disabled');
    }
    otherMap = () => {
        $('#map2').removeAttr('disabled');
        var kucing = $('#latitude').val();
        var kuda = $('#longitude').val();
        console.log($('#latitude').val())

        quick.leafletMapShowStatic('map2', kucing, kuda);
    }
    // mapInit = () => {
    //     var map = L.map('map').setView([-2.5489, 118.0149], 5); 

    //     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //         attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    //     }).addTo(map);

    //     var markers = [];

    //     map.on('click', function (e) {
    //         markers.forEach(function (marker) {
    //             map.removeLayer(marker);
    //         });
    //         markers = []; 

    //         var marker = L.marker(e.latlng).addTo(map); 
    //         marker.bindPopup('Latitude: ' + e.latlng.lat + '<br>Longitude: ' + e.latlng.lng).openPopup();
    //         markers.push(marker); 
    //         var latitude = e.latlng.lat
    //         var longitude = e.latlng.lng

    //         $('#latitude').val(latitude);
    //         $('#longitude').val(longitude);

    //     });
    // }
    // mapInit = () => {
    //     var latitude = '#latitude'
    //     var longitude = '#longitude'
    //     quick.leafletMapSelector(latitude, longitude);
    // }
</script>
