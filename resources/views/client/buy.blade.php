<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Payment Tracker</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
   integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
   crossorigin=""/>
  <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css"/>

   <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
  integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
  crossorigin=""></script>
  <!-- Make sure you put this AFTER leaflet.js, when using with leaflet -->
  <script src="https://unpkg.com/leaflet-geosearch@latest/dist/bundle.min.js"></script>

  <!-- Sertakan Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/client/buy/styles.css') }}">

</head>
<body>
  <!-- resources/views/layouts/app.blade.php atau file Blade yang relevan -->

<!-- Container -->
<div id="container">
  <div class="left">
    <!-- Buat elemen div dengan id "map" -->
    <div id="map"></div>
  </div>
  <div class="right">
    <form id="buyForm" method="POST" action="{{ route('buy-form-submit') }}">
      @csrf
      <input type="hidden" id="id_user" name="id_user" value="{{ session('id') }}" required>
      <div class="input-box">
        <label>Property ID</label>
        <input type="text" id="property_id" name="property_id" required>
    </div>
      <div class="input-box">
        <label>Latitude</label>
        <input type="text" id="latitude" name="latitude" required>
    </div>
    <div class="input-box">
        <label>Longitude</label>
        <input type="text" id="longtitude" name="longtitude" required>
    </div>
      
      <div class="input-box">
        <label>Uang Muka</label>
        <input type="Number" id="uang_muka" name="uang_muka" placeholder="Rp." required>
      </div>
      <label for="">
        Jangka Waktu Pinjaman
        <select id="loan_term" name="loan_term" required>
          <option value="">Choose Year..</option>
          <option value="10">10</option>
          <option value="15">15</option>
          <option value="20">20</option>
          <option value="30">30</option>
        </select>
      </label>
      <div class="input-box">
        <label>Cicilan Bulanan</label>
        <input type="number" placeholder="Rp." id="harga" name="harga" required>
      </div>
      <div class="input-box">
        <label>Asuransi</label>
        <input type="text" id="asuransi" name="asuransi" required>
      </div>
      <input type="submit" name="" value="Proceed to Checkout">
      <button type="button" onclick="history.back()">Back</button>
    </form>
    
        
  </div>

</div>

<script>
  // you want to get it of the window global
  const providerOSM = new GeoSearch.OpenStreetMapProvider();

  //leaflet map
  var leafletMap = L.map('map', {
  fullscreenControl: true,
  // OR
  fullscreenControl: {
      pseudoFullscreen: false // if true, fullscreen to page width and height
  },
  minZoom: 2
  }).setView([-6.977688, 107.640778], 29.5);

  L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    attribution: '© Google Maps'
  }).addTo(leafletMap);
  

  let theMarker = {};

  const search = new GeoSearch.GeoSearchControl({
      provider: providerOSM,
      style: 'icon',
      searchLabel: 'Bandung',
  });

  leafletMap.addControl(search);

  const homeIcon = L.divIcon({
    html: '<i class="fas fa-home fa-2x" style="color: blue;font-size: 50px;"></i>',
    className: 'custom-div-icon',
    iconSize: [10,10],
    popupAnchor: [0, -10]
});

fetch('/properties')
        .then(response => response.json())
        .then(properties => {
            properties.forEach(property => {
                const marker = L.marker([property.latitude, property.longtitude], { icon: homeIcon })
                    .addTo(leafletMap)
                    .bindPopup(`
                        <b>Alamat:</b> ${property.alamat}<br>
                        <b>Harga:</b> Rp.${property.harga}<br>
                        <b>Luas:</b> ${property.luas} m²<br>
                        <b>Lebar:</b> ${property.lebar} m²<br>
                        <b>Jumlah Lantai:</b> ${property.jumlah_lantai}<br>
                        <b>Tanggal Jual:</b> ${property.tanggal_jual}<br>
                        <b>Latitude:</b> ${property.latitude}<br>
                        <b>Longitude:</b> ${property.longtitude}<br>
                        <button onclick="buyProperty(${property.id}, ${property.latitude}, ${property.longtitude})">Beli</button>
                    `);
            });
        })
        .catch(error => console.error('Error fetching properties:', error));

    function buyProperty(propertyId, latitude, longtitude) {
        document.getElementById('property_id').value = propertyId;
        document.getElementById('latitude').value = latitude.toString();
        document.getElementById('longtitude').value = longtitude.toString();
        alert("Properti terpilih: " + propertyId);
    }

</script>
 
</body>

</html>
